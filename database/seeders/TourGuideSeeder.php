<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tourGuides = [
            [
                'idTourGuide' => 'TG1',
                'idAddress' => 1,
                'name' => 'John Doe',
                'phone' => '0123456789',
                'email' => 'john.doe@gmail.com',
            ],
            [
                'idTourGuide' => 'TG2',
                'idAddress' => 2,
                'name' => 'Jane Smith',
                'phone' => '0987654321',
                'email' => 'jane.smith@gmail.com',
            ],
            [
                'idTourGuide' => 'TG3',
                'idAddress' => 3,
                'name' => 'Robert Brown',
                'phone' => '0111222333',
                'email' => 'robert.brown@gmail.com',
            ],
            [
                'idTourGuide' => 'TG4',
                'idAddress' => 4,
                'name' => 'Alice Green',
                'phone' => '0222333444',
                'email' => 'alice.green@gmail.com',
            ],
        ];

        foreach ($tourGuides as $tourGuide) {
            DB::table('tour_guides')->insert([
                'idTourGuide' => $tourGuide['idTourGuide'],
                'idAddress' => $tourGuide['idAddress'],
                'name' => $tourGuide['name'],
                'phone' => $tourGuide['phone'],
                'email' => $tourGuide['email'],
            ]);
        }
    }
}
