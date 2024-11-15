<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        OrderItem::factory(10)->create();  // Create 10 order items
    }
}
