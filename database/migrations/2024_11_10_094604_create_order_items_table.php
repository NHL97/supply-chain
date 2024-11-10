<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('order_id')->constrained('purchase_orders')->onDelete('cascade');  // Foreign key to purchase_orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Foreign key to products
            $table->integer('quantity');  // Quantity of the product in the order
            $table->float('unit_price');  // Price per unit of the product
            $table->json('specifications')->nullable();  // JSON column for specifications (e.g., color, size)
            $table->timestamps();  // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
