<?php

namespace Database\Seeders;

use App\Models\Reservation;

use App\Models\Table;

use App\Models\ReservationList;

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

      
    Table::factory(10)->create();

    // Seed reservations (50 reservations for example)
    Reservation::factory(50)->create();

    // Seed reservation lists (30 reservation lists for example)
    ReservationList::factory(30)->create();
    }
}
