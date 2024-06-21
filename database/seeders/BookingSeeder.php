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
                'idUser' => 3,
                'idTour' => 'TO1',
                'quantityTicket' => 2,
                'confirmation_status' => 'waiting_for_admin',
                'payment_status' => 'unpaid',
            ],
            [
                'idBooking' => 'BK2',
                'idUser' => 4,
                'idTour' => 'TO2',
                'quantityTicket' => 1,
                'confirmation_status' => 'confirmed',
                'payment_status' => 'unpaid',
            ],
            [
                'idBooking' => 'BK3',
                'idUser' => 6,
                'idTour' => 'TO3',
                'quantityTicket' => 1,
                'confirmation_status' => 'confirmed',
                'payment_status' => 'paid',
            ],
            [
                'idBooking' => 'BK4',
                'idUser' => 2,
                'idTour' => 'TO4',
                'quantityTicket' => 1,
                'confirmation_status' => 'confirmed',
                'payment_status' => 'paid',
            ],
            [
                'idBooking' => 'BK5',
                'idUser' => 5,
                'idTour' => 'TO4',
                'quantityTicket' => 1,
                'confirmation_status' => 'confirmed',
                'payment_status' => 'paid',
            ],
            [
                'idBooking' => 'BK6',
                'idUser' => 5,
                'idTour' => 'TO6',
                'quantityTicket' => 1,
                'confirmation_status' => 'waiting_for_admin',
                'payment_status' => 'unpaid',
            ],
            [
                'idBooking' => 'BK7',
                'idUser' => 8,
                'idTour' => 'TO5',
                'quantityTicket' => 1,
                'confirmation_status' => 'waiting_for_admin',
                'payment_status' => 'unpaid',
            ],
            // Add more dummy data as needed
        ];

        // Insert data into the bookings table
        DB::table('bookings')->insert($bookings);
    }
}
