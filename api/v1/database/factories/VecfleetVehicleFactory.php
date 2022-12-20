<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Fakecar;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VecfleetVehicle>
 */
class VecfleetVehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        return [
            'type_id' => rand(1, 50),
            'wheels' => $this->faker->vehicleDoorCount,
            'brand_id' => rand(1, 50),
            'model' =>  $vehicle['model'],
            'patent' => $this->faker->vehicleRegistration('[A-Z]{2}-[0-9]{5}'),
            'chassis' => str_replace(' ', '_', $this->faker->vehicleType),
            'km_traveled' => rand(100, 6000000),

        ];
    }
}
