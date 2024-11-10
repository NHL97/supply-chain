<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');  // Foreign key to locations table
            $table->float('capacity');  // Capacity of the warehouse
            $table->json('specifications')->nullable();  // JSON column for specifications
            $table->timestamps();  // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
