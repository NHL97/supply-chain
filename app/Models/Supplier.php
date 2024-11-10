<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
        'category',
        'rating',
        'industry_specific'
    ];

    protected $casts = [
        'contact_info' => 'array',
        'industry_specific' => 'array',
        'rating' => 'decimal:2'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
