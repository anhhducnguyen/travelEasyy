<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'idVehicle' => 'VH1',
                'name' => 'Car 1',
                'licensePlate' => '29V3-38777',
            ],
            [
                'idVehicle' => 'VH2',
                'name' => 'VinFast 1',
                'licensePlate' => '30V-33333',
            ],
            [
                'idVehicle' => 'VH3',
                'name' => 'Mini Bus',
                'licensePlate' => '66C-12345',
            ],
            [
                'idVehicle' => 'VH4',
                'name' => 'Toyota 1',
                'licensePlate' => '99C-55555',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            DB::table('tblvehicle')->insert([
                'idVehicle' => $vehicle['idVehicle'],
                'name' => $vehicle['name'],
                'licensePlate' => $vehicle['licensePlate'],
            ]);
        }
    }
}
