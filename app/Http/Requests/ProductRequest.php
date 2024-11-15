<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku',
            'base_price' => 'required|numeric',
            'specifications' => 'nullable|json',
            'category' => 'required|string',
            'industry_params' => 'nullable|json',
        ];
    }
}
