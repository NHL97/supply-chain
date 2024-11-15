<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'sku' => $this->faker->unique()->word,
            'base_price' => $this->faker->randomFloat(2, 10, 500),
            'specifications' => json_encode(['color' => $this->faker->colorName, 'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL'])]),
            'category' => $this->faker->word,
            'industry_params' => json_encode(['material' => $this->faker->word, 'weight' => $this->faker->randomNumber(2)]),
        ];
    }
}
