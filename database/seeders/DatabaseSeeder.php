<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(RoleSeeder::class);
         // Creamos el 1 usuario administrador que será encargado de gestionar a los usuarios hasta que el mismo habilite a otro/s usuarios con sus respectivos roles
         // Verificamos el email con la fecha actual para evitar confirmar al administrador de la aplicacion  
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'password' =>bcrypt('administrador'),
            'email_verified_at' => now()  
            
        ])-> assignRole('Admin'); 

        //Para llamar a los Seeder CourtSeeder, SectionSeeder y TariffSeeder
        $this->call(CourtSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(TariffSeeder::class);
    }
}
