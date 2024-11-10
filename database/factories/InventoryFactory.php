<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'warehouse_id' => Warehouse::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 100),
            'expiry_date' => $this->faker->date,
            'batch_number' => $this->faker->word,
            'tracking_data' => json_encode(['location' => $this->faker->word, 'status' => $this->faker->word]),
        ];
    }
}
