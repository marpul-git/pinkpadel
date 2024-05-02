<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * SECCIONES HORARIAS
     * 
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

        $section7 = new Section();
        $section7->start_time = '12:00:00';
        $section7->end_time = '12:30:00';
        $section7->save();

        $section8 = new Section();
        $section8->start_time = '12:30:00';
        $section8->end_time = '13:00:00';
        $section8->save();

        $section9 = new Section();
        $section9->start_time = '13:00:00';
        $section9->end_time = '13:30:00';
        $section9->save();

        $section10 = new Section();
        $section10->start_time = '13:30:00';
        $section10->end_time = '14:00:00';
        $section10->save();

        $section11 = new Section();
        $section11->start_time = '14:00:00';
        $section11->end_time = '14:30:00';
        $section11->save();

        $section12 = new Section();
        $section12->start_time = '14:30:00';
        $section12->end_time = '15:00:00';
        $section12->save();

        $section13 = new Section();
        $section13->start_time = '15:00:00';
        $section13->end_time = '15:30:00';
        $section13->save();

        $section14 = new Section();
        $section14->start_time = '15:30:00';
        $section14->end_time = '16:00:00';
        $section14->save();

        $section15 = new Section();
        $section15->start_time = '16:00:00';
        $section15->end_time = '16:30:00';
        $section15->save();

        $section16 = new Section();
        $section16->start_time = '16:30:00';
        $section16->end_time = '17:00:00';
        $section16->save();

        $section17 = new Section();
        $section17->start_time = '17:00:00';
        $section17->end_time = '17:30:00';
        $section17->save();

        $section18 = new Section();
        $section18->start_time = '17:30:00';
        $section18->end_time = '18:00:00';
        $section18->save();

        $section19 = new Section();
        $section19->start_time = '18:00:00';
        $section19->end_time = '18:30:00';
        $section19->save();

        $section20 = new Section();
        $section20->start_time = '18:30:00';
        $section20->end_time = '19:00:00';
        $section20->save();

        $section21 = new Section();
        $section21->start_time = '19:00:00';
        $section21->end_time = '19:30:00';
        $section21->save();

        $section22 = new Section();
        $section22->start_time = '19:30:00';
        $section22->end_time = '20:00:00';
        $section22->save();
    }
}
