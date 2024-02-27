<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tariff;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        $levels = ['Desconocido','Iniciación', 'Medio', 'Medio-Alto', 'Alto', 'Competición'];

        $tariffs = Tariff::all();

        return view('admin.users.edit', compact('user', 'roles', 'levels','tariffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //dd($request->tariff_id);
        $user->roles()->sync($request->roles);
        $user->update(['level' => $request->level]);
        $user->update(['tariff_id' => $request->tariff]);
        return redirect()->route('admin.users.index', $user)->with('info', 'Se actualizaron los datos de '.$user->name.' correctamente');
    }


    public function updateTariff(Request $request)
    {


        $request->validate([
            'user_id' => 'required',
            'tariff_id' => 'required',
        ]);

        $nameTariff = Tariff::where('id', $request->tariff_id)->value('name');

        // dd($nameTariff);

        $user = User::findOrFail($request->user_id);

        $user->update(['tariff_id' => $request->tariff_id]);

        //return redirect()->back()->with('info', 'Tarifa actualizada para el usuario');
        return redirect()->route('admin.tariffs.index', $user)->with('info', 'Se ha actualizado la tarifa de ' . $user->name . ' a: ' . $nameTariff);
    }

   
}
