<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 confirmed reservations
        Reservation::factory()->count(20)->confirmed()->create();

        // Create 10 pending reservations`
        Reservation::factory()->count(10)->pending()->create();

        // Create 5 cancelled reservations
        Reservation::factory()->count(5)->cancelled()->create();
    }
}
