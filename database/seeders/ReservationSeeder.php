<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{

    public function run(): void
    {

        Reservation::factory()->count(20)->confirmed()->create();


        Reservation::factory()->count(10)->pending()->create();


        Reservation::factory()->count(5)->cancelled()->create();
    }
}
