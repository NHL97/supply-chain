<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => PurchaseOrder::inRandomOrder()->first()->id,  // Random purchase order
            'product_id' => Product::inRandomOrder()->first()->id,  // Random product
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
            'specifications' => json_encode([
                'color' => $this->faker->colorName,
                'size' => $this->faker->randomElement(['S', 'M', 'L']),
            ]),
        ];
    }
}
