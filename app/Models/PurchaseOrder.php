<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'order_date',
        'status',
        'total_amount',
        'terms',
    ];

    protected $casts = [
        'terms' => 'array',  // Automatically cast terms to array
    ];

    // Relationship to Supplier model
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
