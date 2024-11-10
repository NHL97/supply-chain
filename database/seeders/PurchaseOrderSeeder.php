<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    public function run()
    {
        PurchaseOrder::factory(10)->create();  // Create 10 purchase orders
    }
}
