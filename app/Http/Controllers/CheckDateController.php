<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Court;
use App\Models\Event;

class CheckDateController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'date_input' => 'required'
        ]);

        $selectedDate = $request->input('date_input') ?: now();

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
        return view('check_date', compact('eventData', 'courts', 'sections', 'selectedDate'));

       
        
    }
}
