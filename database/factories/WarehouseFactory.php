<?php

namespace Database\Factories;

use App\Models\Warehouse;
use App\Models\Location;  // Assuming you have a Location model
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    protected $model = Warehouse::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location_id' => Location::inRandomOrder()->first()->id,  // Random location from locations table
            'capacity' => $this->faker->randomFloat(2, 100, 5000),  // Warehouse capacity
            'specifications' => json_encode([
                'temperature' => $this->faker->randomElement(['cold', 'ambient']),
                'security' => $this->faker->randomElement(['high', 'medium', 'low']),
            ]),
        ];
    }
}
