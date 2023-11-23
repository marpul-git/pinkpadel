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
        $court1->name = 'Pista 1';
        $court1->type = 'Padel';
        $court1->save();

        $court2 = new Court();
        $court2->name = 'Pista 2';
        $court2->type = 'Padel';
        $court2->save();

        $court3 = new Court();
        $court3->name = 'Pista 3';
        $court3->type = 'Padel';
        $court3->save();

        $court4 = new Court();
        $court4->name = 'Pista 4';
        $court4->type = 'Padel';
        $court4->save();

        $court5 = new Court();
        $court5->name = 'Pista 5';
        $court5->type = 'Padel';
        $court5->save();

        $court6 = new Court();
        $court6->name = 'Pista 6';
        $court6->type = 'Padel';
        $court6->save();

        $court7 = new Court();
        $court7->name = 'Pista 7';
        $court7->type = 'Padel';
        $court7->save();

        $court8 = new Court();
        $court8->name = 'Pista 8';
        $court8->type = 'Padel';
        $court8->save();



    }
}
