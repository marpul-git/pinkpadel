<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tariff;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{

    public function __construct() {
        /*
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
        */
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
       // $roles = Role::all();
      
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //dd($request->tariff_id);
        $user->roles()->sync($request->roles);
       
        return redirect()->route('admin.users.edit',$user)->with('info','Se asignaron los roles correctamente');
    }


    public function updateTariff(Request $request)
    {
      
        
        $request->validate([
            'user_id' => 'required',
            'tariff_id' => 'required',
        ]);
    
        $user = User::findOrFail($request->user_id);
        
        $user->update(['tariff_id' => $request->tariff_id]);
        
        return redirect()->back()->with('info', 'Tarifa actualizada para el usuario');
    }

    
}

