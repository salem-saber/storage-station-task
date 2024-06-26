<?php

namespace Database\Seeders;

use App\Models\ShippingAwb;
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

        ShippingAwb::factory(50)->create();
    }
}
