<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /*
    public function __construct() {
        $this->middleware('can:admin.sections.index')->only('index');
        $this->middleware('can:admin.sections.create')->only('create','store');
        $this->middleware('can:admin.sections.edit')->only('edit','update');
        $this->middleware('can:admin.sections.destroy')->only('destroy');
       
        
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $section = Section::create($request->all());

        return redirect()->route('admin.sections.index',compact('section'))->with('info', 'La sección se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('admin.sections.show',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        
        return view('admin.sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $section->update($request->all());
        return redirect()->route('admin.sections.index',$section)->with('info', 'La sección se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('admin.sections.index')->with('info', 'La sección se eliminó con éxito');
    }
}
