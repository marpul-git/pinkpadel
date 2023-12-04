<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Court;
use App\Models\Event;
use App\Models\Player;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.events.index')->only('index');
        $this->middleware('can:admin.events.create')->only('create', 'store');
        $this->middleware('can:admin.events.edit')->only('edit', 'update');
        $this->middleware('can:admin.events.destroy')->only('destroy');
    }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $courts = Court::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $sections = Section::get();
        // Obtener todas las secciones disponibles
        //$allSections = Section::pluck('start_time', 'id');

        $allSections = Section::select('id', 'start_time', 'end_time')->get()->keyBy('id');
        //$events = Event::get();
        // Obtener los valores de pista, sección y fecha de la solicitud
        $selectedCourtId = $request->input('court_id');
        $selectedSectionId = $request->input('section_id');
        $selectedDate = $request->input('selectedDate');

        $selectedSections = [];

        return view('admin.events.create', compact('courts', 'users', 'sections', 'allSections', 'selectedSections', 'selectedCourtId', 'selectedSectionId', 'selectedDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'type' => 'required',
            'state' => 'required',

            'user_id' => 'required',
            'court_id' => 'required',
            'section_id' => 'required|array|min:1',
            // Asegurarse de que al menos el usuario  1 esté seleccionada.
            'user1_id' => 'required|exists:users,id',
            'user2_id' => 'nullable|exists:users,id',
            'user3_id' => 'nullable|exists:users,id',
            'user4_id' => 'nullable|exists:users,id',
        ]);

        // Comprobamos las secciones que estan ocupadas ese dia en esa pista
        $occupiedSections = DB::table('event_section')
            ->join('events', 'event_section.event_id', '=', 'events.id')
            ->where('events.date', $request->input('date'))
            ->where('events.court_id', $request->input('court_id'))
            ->pluck('event_section.section_id')
            ->toArray();

       

        // Obtener las secciones seleccionadas del formulario
        $selectedSections = $request->input('section_id');
        
        /*
         dd($arraySections);

        //  añadir 1 a las secciones, que al ser obtenida mediante un foreach el indice es 0
        $selectedSections = array_map(function ($element) {
            return $element + 1;
        }, $arraySections);
        */
        //dd($selectedSections);
        // Comparamos las secciones seleccionadas con las ocupadas
        $conflictingSections = array_intersect($occupiedSections, $selectedSections);




        if (!empty($conflictingSections)) {

            //dd($endConflict);
            // Almacenamos las id's de las sesiones ocupadas

            $startConflict = min(array_map(function ($element) {
                $start_conflict = Section::where('id', $element)->value('start_time');
                return $start_conflict;
            }, $conflictingSections));

            $endConflict = max(array_map(function ($element) {
                $end_conflict = Section::where('id', $element)->value('end_time');
                return $end_conflict;
            }, $conflictingSections));

            // Hay conflictos, guarda los datos del formulario en la sesión
            session()->flashInput($request->input());
            // Hay conflictos, redirige con un mensaje de error
            return redirect()->back()->with('error', 'La pista está ocupada ese día de ' . $startConflict . ' a ' . $endConflict . '');
        } else {
            // Crear el evento excepto los id
            $event = Event::create($request->except('section_id'));
        }




        //dd($selectedSections);

        // Asociar las secciones seleccionadas al evento 

        foreach ($selectedSections as $sectionId) {
            $section = Section::find($sectionId);
            if ($section) {
                $event->sections()->attach($sectionId);
            }
        }


        // Obtener los jugadores seleccionados del formulario (user1_id es obligatorio, user2_id, user3_id y user4_id son opcionales)
        $selectedPlayers = [
            'user1_id' => $request->input('user1_id'),
            'user2_id' => $request->input('user2_id'),
            'user3_id' => $request->input('user3_id'),
            'user4_id' => $request->input('user4_id'),
        ];

        // Crear la entrada en la tabla players con la relación uno a uno
        $event->player()->create($selectedPlayers);



        return redirect()->route('admin.events.index')->with('info', 'El evento se creó con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {

        return view('admin.events.show', compact('event'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {

        $courts = Court::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $sections = Section::pluck('start_time', 'id');
        // Obtener todas las secciones disponibles
        //$allSections = Section::pluck('start_time', 'id');
        $allSections = Section::select('id', 'start_time', 'end_time')->get()->keyBy('id');
        //dd($allSections);
        $selectedSections = [];
        $eventDate = optional($event->sections->first())->date;

        // Cargar la relación "player"

        // Obtener los jugadores del evento
        $players = Player::where('event_id', $event->id)->first();

        return view('admin.events.edit', compact('event', 'courts', 'users', 'sections', 'allSections', 'selectedSections', 'eventDate', 'players'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {

        $request->validate([
            'date' => 'required',
            'type' => 'required',
            'state' => 'required',

            'user_id' => 'required',
            'court_id' => 'required',
            'section_id' => 'required|array|min:1', // Asegurarse de que al menos una sección esté seleccionada.
        ]);

        // Comprobamos las secciones que estan ocupadas ese dia en esa pista

        $occupiedSections = DB::table('event_section')
            ->join('events', 'event_section.event_id', '=', 'events.id')
            ->where('events.date', $request->input('date'))
            ->where('events.court_id', $request->input('court_id'))
            ->pluck('event_section.section_id')
            ->toArray();
        // Comprobamos las secciones que ocupa ahora mismo ese evento

        $occupiedSectionsEvent = DB::table('event_section')
            ->join('events', 'event_section.event_id', '=', 'events.id')
            ->where('events.date', $request->input('date'))
            ->where('events.court_id', $request->input('court_id'))
            ->where('events.id', $event->id) // Agregar condición para el evento específico
            ->pluck('event_section.section_id')
            ->toArray();

        // Quitamos las seciones que ocupaba anteriormente ese evento

        $occupiedSectionsAct = array_diff($occupiedSections, $occupiedSectionsEvent);

        //dd(occupiedSectionsAct);

        // Obtener las secciones seleccionadas del formulario
        $selectedSections = $request->input('section_id');

       
        //dd($selectedSections);
        // Comparamos las secciones seleccionadas con las ocupadas
        $conflictingSections = array_intersect($occupiedSectionsAct, $selectedSections);




        if (!empty($conflictingSections)) {

            //dd($endConflict);
            // Almacenamos las id's de las sesiones ocupadas

            $startConflict = min(array_map(function ($element) {
                $start_conflict = Section::where('id', $element)->value('start_time');
                return $start_conflict;
            }, $conflictingSections));

            $endConflict = max(array_map(function ($element) {
                $end_conflict = Section::where('id', $element)->value('end_time');
                return $end_conflict;
            }, $conflictingSections));

            // Hay conflictos, guarda los datos del formulario en la sesión
            session()->flashInput($request->input());
            // Hay conflictos, redirige con un mensaje de error
            return redirect()->back()->with('error', 'La pista está ocupada ese día de ' . $startConflict . ' a ' . $endConflict . '');
        } else {

            // Actualizar el evento con los datos del formulario, excepto 'section_id'
            $event->update($request->except('section_id', 'player_name_1', 'player_name_2', 'player_name_3', 'player_name_4'));

            // Obtener las secciones seleccionadas del formulario
            $selectedSections = $request->input('section_id');

            // Desasociar todas las secciones existentes
            $event->sections()->detach();

            // Asociar las secciones seleccionadas al evento 
            foreach ($selectedSections as $sectionId) {
                $section = Section::find($sectionId);
                if ($section) {
                    $event->sections()->attach($sectionId);
                }
            }

            $players = Player::where('event_id', $event->id)->first();

            // Actualizar los datos de los jugadores
            $players->update([
                'user1_id' => $request->input('user1_id'),
                'user2_id' => $request->input('user2_id'),
                'user3_id' => $request->input('user3_id'),
                'user4_id' => $request->input('user4_id'),
            ]);

            return redirect()->route('admin.events.edit',$event)->with('info', 'El evento se actualizó con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('info', 'El evento se eliminó con éxito');
    }

    public function eventsByDay(Request $request)
    {
        // Obtener la fecha seleccionada o la fecha actual por defecto
        $selectedDate = $request->input('selectedDate') ?: now()->format('Y-m-d');

        // Obtener los eventos correspondientes a la fecha seleccionada que tengan al menos una sección asociada
        $events = Event::whereHas('sections', function ($query) use ($selectedDate) {
            $query->whereDate('events.date', $selectedDate);
        })->with('sections')->paginate();

        return view('admin.events.by-day', compact('events', 'selectedDate'));
    }

    public function eventsByDayTable(Request $request)
    {

        $selectedDate = $request->input('selectedDate') ?: now();

        // Obtener los eventos correspondientes a la fecha seleccionada que tengan al menos una sección asociada
        $events = Event::whereHas('sections', function ($query) use ($selectedDate) {
            $query->whereDate('events.date', $selectedDate);
        })->with('sections')->get();

        $courts = Court::all();
        $sections = Section::all();

        // Construir el array de datos
        $eventData = [];
        foreach ($sections as $section) {
            foreach ($courts as $court) {
                $eventData[$section->id][$court->id] = 'Libre';
            }
        }

        // a partir de aqui tenemos que recorrer el array $eventData


        foreach ($events as $event) {
            foreach ($event->sections as $section) {
                //dd($section->id); //seccion 2
                //dd($event->court_id);// pista 1


                $eventData[$section->id][$event->court_id] = $event;
            }
        }
        //dd($eventData);
        return view('admin.events.by-day-table', compact('eventData', 'courts', 'sections', 'selectedDate'));
    }
}
