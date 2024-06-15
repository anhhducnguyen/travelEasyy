<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'idBooking' => 'BK1',
                'idUser' => 1,
                'idTour' => 'TO1',
                'quantityTicket' => 2,
                'confirmation_status' => 'waiting_for_admin',
                'payment_status' => 'unpaid',
            ],
            // [
            //     'idBooking' => 'BK2',
            //     'idUser' => 2,
            //     'idTour' => 'TO1',
            //     'quantityTicket' => 1,
            //     'confirmation_status' => 'confirmed',
            //     'payment_status' => 'paid',
            // ],
            // Add more dummy data as needed
        ];

        // Insert data into the bookings table
        DB::table('bookings')->insert($bookings);
    }
}
