<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'specifications',
    ];

    protected $casts = [
        'specifications' => 'array',  // Automatically cast to array
    ];

    // Relationship to PurchaseOrder model
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'order_id');
    }

    // Relationship to Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
