<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'contact_info' => $this->faker->email,
            'category' => $this->faker->word,
            'rating' => $this->faker->randomFloat(2, 1, 5), // Rating between 1.00 and 5.00
            'industry_specific' => json_encode([
                'products' => $this->faker->words(3),
                'location' => $this->faker->address,
                'certifications' => $this->faker->words(2)
            ]),
        ];
    }
}
