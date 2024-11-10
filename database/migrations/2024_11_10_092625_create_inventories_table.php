<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Foreign key to products table
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');  // Foreign key to warehouses table
            $table->integer('quantity');
            $table->date('expiry_date');
            $table->string('batch_number');
            $table->json('tracking_data')->nullable();  // JSON column for tracking data
            $table->timestamps();  // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
