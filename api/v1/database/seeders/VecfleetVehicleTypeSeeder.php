<?php

namespace Database\Seeders;

use App\Models\VecfleetVehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VecfleetVehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VecfleetVehicleType::factory()->count(50)->create();
    }
}
