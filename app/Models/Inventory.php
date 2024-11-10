<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'quantity',
        'expiry_date',
        'batch_number',
        'tracking_data',
    ];

    protected $casts = [
        'tracking_data' => 'array',  // Automatically cast to array
    ];

    // Relationship to Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship to Warehouse model
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
