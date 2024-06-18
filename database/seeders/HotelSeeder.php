<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'idHotel' => 'HT1',
                'idAddress' => 1,
                'name' => 'Hotel A',
            ],
            [
                'idHotel' => 'HT2',
                'idAddress' => 2,
                'name' => 'Hotel B',
            ],
            [
                'idHotel' => 'HT3',
                'idAddress' => 3,
                'name' => 'Hotel C',
            ],
            [
                'idHotel' => 'HT4',
                'idAddress' => 4,
                'name' => 'Hotel D',
            ],
        ];

        foreach ($hotels as $hotel) {
            DB::table('tblhotel')->insert([
                'idHotel' => $hotel['idHotel'],
                'idAddress' => $hotel['idAddress'],
                'name' => $hotel['name'],
            ]);
        }
    }
}
