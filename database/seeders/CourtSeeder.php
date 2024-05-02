<?php

namespace Database\Seeders;

use App\Models\Court;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $court1 = new Court();
        $court1->name = 'PADEL 1 CI';
        $court1->type = 'Padel';
        $court1->save();

        $court2 = new Court();
        $court2->name = 'PADEL 2 CI';
        $court2->type = 'Padel';
        $court2->save();

        $court3 = new Court();
        $court3->name = 'PADEL 3 CI';
        $court3->type = 'Padel';
        $court3->save();

        $court4 = new Court();
        $court4->name = 'PADEL 4 MI';
        $court4->type = 'Padel';
        $court4->save();

        $court5 = new Court();
        $court5->name = 'PADEL 5 CE';
        $court5->type = 'Padel';
        $court5->save();

        $court6 = new Court();
        $court6->name = 'PADEL 6 ME';
        $court6->type = 'Padel';
        $court6->save();

        $court7 = new Court();
        $court7->name = 'PADEL 7 ME';
        $court7->type = 'Padel';
        $court7->save();

        $court8 = new Court();
        $court8->name = 'Pista 8 ME';
        $court8->type = 'Padel';
        $court8->save();



    }
}
