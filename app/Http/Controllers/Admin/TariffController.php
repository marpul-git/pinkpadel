<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Tariff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TariffController extends Controller
{

    /*
    public function __construct()
    {
        $this->middleware('can:admin.tariffs.index')->only('index');
        $this->middleware('can:admin.tariffs.create')->only('create', 'store');
        $this->middleware('can:admin.tariffs.edit')->only('edit', 'update');
        $this->middleware('can:admin.tariffs.destroy')->only('destroy');
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tariffs = Tariff::all();
        $usersWithTariffs = User::with('tariff')->get()->sortBy('name');

        $users = [];

        foreach ($usersWithTariffs as $user) {
            $tariffName = $user->tariff ? $user->tariff->name : 'Sin tarifa';
            $users[$user->id] = "{$user->name} ({$tariffName})";
        }


        return view('admin.tariffs.index', compact('tariffs', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tariffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tariffs',
            'price' => 'required'
        ]);

        $tariff =  Tariff::create($request->all());

        return redirect()->route('admin.tariffs.index', compact('tariff'))->with('info', 'La tarifa se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tariff $tariff)
    {
        return view('admin.tariffs.show', compact('tariff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tariff $tariff)
    {
        return view('admin.tariffs.edit', compact('tariff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tariff $tariff)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);


        $tariff->update($request->all());
        return redirect()->route('admin.tariffs.index', $tariff)->with('info', 'La tarifa se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tariff $tariff)
    {
        $tariff->delete();

        return redirect()->route('admin.tariffs.index', $tariff)->with('info', 'La tarifa se eliminó con éxito');
    }
}
