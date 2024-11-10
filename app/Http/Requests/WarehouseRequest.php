<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'location_id' => 'required|exists:locations,id',  // Assuming a Location model exists
            'capacity' => 'required|numeric',
            'specifications' => 'nullable|json',
        ];
    }
}
