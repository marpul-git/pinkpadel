<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create','store');
        $this->middleware('can:admin.roles.edit')->only('edit','update');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
       
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = Permission::all();

        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        
        $role = Role::create($request->all());//se crea un nuevo rol

        $role->permissions()->sync($request->permissions);//asignamos distintos permisos al rol

        return redirect()->route('admin.roles.edit',$role)->with('info','El rol se creó con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $selectedPermissions = $role->permissions->pluck('id')->toArray();

        

        return view('admin.roles.edit',compact('role','permissions','selectedPermissions'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Role $role)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);//asignamos distintos permisos al rol

        return redirect()->route('admin.roles.edit',$role)->with('info','El rol se actualizó con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index',$role)->with('info','El rol se eliminó con exito');
    }
}
