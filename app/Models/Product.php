<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'base_price',
        'specifications',
        'category',
        'industry_params',
    ];

    protected $casts = [
        'specifications' => 'array',  // Automatically cast to array
        'industry_params' => 'array',  // Automatically cast to array
    ];
}
