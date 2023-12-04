<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section1 = new Section();
        $section1->start_time = '09:00:00';
        $section1->end_time = '09:30:00';
        $section1->save();

        $section2 = new Section();
        $section2->start_time = '09:30:00';
        $section2->end_time = '10:00:00';
        $section2->save();

        $section3 = new Section();
        $section3->start_time = '10:00:00';
        $section3->end_time = '10:30:00';
        $section3->save();

        $section4 = new Section();
        $section4->start_time = '10:30:00';
        $section4->end_time = '11:00:00';
        $section4->save();

        $section5 = new Section();
        $section5->start_time = '11:00:00';
        $section5->end_time = '11:30:00';
        $section5->save();

        $section6 = new Section();
        $section6->start_time = '11:30:00';
        $section6->end_time = '12:00:00';
        $section6->save();
    }
}
