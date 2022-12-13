<?php

namespace Database\Seeders;

use App\Models\VecfleetVehicleBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VecfleetVehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VecfleetVehicleBrand::factory()->count(50)->create();
    }
}
