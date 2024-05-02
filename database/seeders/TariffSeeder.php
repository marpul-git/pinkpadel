<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tariff;
class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tariff1 = new Tariff();
        $tariff1->name = 'Publico';
        $tariff1->price = 5;
        $tariff1->save();
        
        $tariff2 = new Tariff();
        $tariff2->name = 'Usuarios';
        $tariff2->price = 4.5;
        $tariff2->save();

        $tariff3 = new Tariff();
        $tariff3->name = 'Federados';
        $tariff3->price = 4;
        $tariff3->save();
    }
}
