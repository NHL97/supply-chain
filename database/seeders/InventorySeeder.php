<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        Inventory::factory(10)->create();  // Create 10 inventory records
    }
}
