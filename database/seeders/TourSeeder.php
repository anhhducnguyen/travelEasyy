<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbltour')->insert([
            [
                'idTour' => 'TO1',
                'name' => 'Tour A',
                'startDay' => '2024-06-15',
                'endDay' => '2024-06-20',
                'cost' => 500,
                'imageTour' => 'assets/images/ar_1-2.jpg',
                'description' => 'This is tour A description.',
                'idAddress' => 9,
                'idHotel' => 'HT1',
                'idVehicle' => 'VH1',
                'idTourGuide' => 'TG1',
            ],
            [
                'idTour' => 'TO2',
                'name' => 'Tour B',
                'startDay' => '2024-07-01',
                'endDay' => '2024-07-10',
                'cost' => 700,
                'imageTour' => 'assets/images/maichau.jpg',
                'description' => 'This is tour B description.',
                'idAddress' => 10,
                'idHotel' => 'HT2',
                'idVehicle' => 'VH3',
                'idTourGuide' => 'TG2',
            ],
        ]);
    }
}
