<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_id',
        'capacity',
        'specifications',
    ];

    protected $casts = [
        'specifications' => 'array',  // Automatically cast to array
    ];

    // Relationship to Location model
    public function location()
    {
        return $this->belongsTo(Location::class);  // Assuming you have a Location model
    }

    // Relationship to Inventory model
    public function inventories()
    {
        return $this->hasMany(Inventory::class);  // Assuming you have an Inventory model
    }
}
