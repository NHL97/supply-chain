<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');  // Foreign key to suppliers table
            $table->date('order_date');
            $table->string('status');
            $table->float('total_amount');
            $table->json('terms')->nullable();  // JSON column for terms
            $table->timestamps();  // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
