<?php

namespace App\Http\Controllers\Admin;

use App\Models\Court;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourtController extends Controller
{
    /*
    public function __construct() {
        $this->middleware('can:admin.courts.index')->only('index');
        $this->middleware('can:admin.courts.create')->only('create','store');
        $this->middleware('can:admin.courts.edit')->only('edit','update');
        $this->middleware('can:admin.courts.destroy')->only('destroy');
    }
    */


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $courts = Court::all();
       //$courts = [];
       // dd($courts);

        return view('admin.courts.index', compact('courts'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courts',
            'type' => 'required'
        ]);


        $data = $request->all();
        $data['name'] = ucfirst($data['name']);//colocar la primera letra en mayusculas
        $data['type'] = ucfirst($data['type']);

        $court = Court::create($data);

        return redirect()->route('admin.courts.index', $court)->with('info', 'La pista se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        return view('admin.courts.show', compact('court'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Court $court)
    {
        $request->validate([
            'name' => 'required|unique:courts',
            'type' => 'required'
        ]);

        $data = $request->all();
        $data['name'] = ucfirst($data['name']);
        $data['type'] = ucfirst($data['type']);

        $court->update($data);

        return redirect()->route('admin.courts.index', $court)->with('info', 'La pista se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        $court->delete();

        return redirect()->route('admin.courts.index')->with('info', 'La pista se eliminó con éxito');
    }
}
