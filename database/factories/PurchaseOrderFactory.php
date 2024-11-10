<?php

namespace Database\Factories;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    protected $model = PurchaseOrder::class;

    public function definition()
    {
        return [
            'supplier_id' => Supplier::inRandomOrder()->first()->id,  // Random supplier from suppliers table
            'order_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'shipped']),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
            'terms' => json_encode([
                'payment_terms' => $this->faker->randomElement(['Net 30', 'COD', 'Net 60']),
                'delivery' => $this->faker->word,
            ]),
        ];
    }
}
