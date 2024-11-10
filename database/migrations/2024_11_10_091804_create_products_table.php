<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // primary key
            $table->string('name');
            $table->string('sku')->unique();
            $table->float('base_price');
            $table->json('specifications')->nullable();  // json column for specifications
            $table->string('category');
            $table->json('industry_params')->nullable();  // json column for industry_params
            $table->timestamps();  // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
