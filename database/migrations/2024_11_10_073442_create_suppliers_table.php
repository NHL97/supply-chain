<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // auto-incrementing id as the primary key
            $table->string('name');
            $table->string('contact_info');
            $table->string('category');
            $table->float('rating', 3, 2); // Rating with precision of 3 digits and 2 decimals
            $table->json('industry_specific')->nullable(); // JSON field for industry-specific data
            $table->timestamps(); // created_at and updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
