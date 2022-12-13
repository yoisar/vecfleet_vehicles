<?php

namespace Database\Seeders;

use App\Models\VecfleetVehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VecfleetVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VecfleetVehicle::factory()->count(50)->create();
    }
}
