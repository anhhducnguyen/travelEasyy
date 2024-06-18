<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => '1234',
        //     'role' => 'admin',
        // ]);
        // User::factory()->create([
        //     'name' => 'phong vu',
        //     'email' => 'user@gmail.com',
        //     'password' => '1234',
        //     'email_verified_at' => now(),
        //     'role' => 'user',
        // ]);
        User::factory()->create([
            'name' => 'Duc Anh',
            'email' => '21012478@st.phenikaa-uni.edu.vn',
            'password' => '1234',
            'email_verified_at' => now(),
            'role' => 'user',
        ]);

        // $this->call([
        //     AddressSeeder::class,
        //     VehicleSeeder::class,
        //     TourGuideSeeder::class,
        //     HotelSeeder::class,    
        //     TourSeeder::class,
        //     BookingSeeder::class,
        //     // Add more seeders here if needed
        // ]);
    }
}
