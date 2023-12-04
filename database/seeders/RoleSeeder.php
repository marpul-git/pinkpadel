<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Editor']);

       

        Permission::create(['name'=>'admin.home','description'=>'Ver Panel'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.users.index','description'=>'Ver listado de usuarios'])->assignRole($role1);
        Permission::create(['name'=>'admin.users.edit','description'=>'Actualizar usuario (asignar rol)'])->assignRole($role1);
      

        Permission::create(['name'=>'admin.courts.index','description'=>'Ver listado de pistas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.courts.create','description'=>'Crear pista'])->assignRole($role1);
        Permission::create(['name'=>'admin.courts.edit','description'=>'Editar pista'])->assignRole($role1);
        Permission::create(['name'=>'admin.courts.destroy','description'=>'Eliminar pista'])->assignRole($role1);


        Permission::create(['name'=>'admin.sections.index','description'=>'Ver listado de secciones'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.sections.create','description'=>'Crear sección'])->assignRole($role1);
        Permission::create(['name'=>'admin.sections.edit','description'=>'Actualizar sección'])->assignRole($role1);
        Permission::create(['name'=>'admin.sections.destroy','description'=>'Eliminar sección'])->assignRole($role1);


        Permission::create(['name'=>'admin.tariffs.index','description'=>'Ver listado de tarifas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tariffs.create','description'=>'Crear tarifa'])->assignRole($role1);
        Permission::create(['name'=>'admin.tariffs.edit','description'=>'Actualizar tarifa'])->assignRole($role1);
        Permission::create(['name'=>'admin.tariffs.destroy','description'=>'Eliminar tarifa'])->assignRole($role1);

        Permission::create(['name'=>'admin.events.index','description'=>'Ver listado de eventos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.events.create','description'=>'Crear evento'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.events.edit','description'=>'Actualizar evento'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.events.destroy','description'=>'Eliminar evento'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.roles.index','description'=>'Ver listado de roles'])->assignRole($role1);
        Permission::create(['name'=>'admin.roles.create','description'=>'Crear rol'])->assignRole($role1);
        Permission::create(['name'=>'admin.roles.edit','description'=>'Editar rol'])->assignRole($role1);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'Eliminar rol'])->assignRole($role1);

    }
}
