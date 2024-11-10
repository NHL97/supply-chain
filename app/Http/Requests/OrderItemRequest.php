<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_id' => 'required|exists:purchase_orders,id',  // Ensure order exists
            'product_id' => 'required|exists:products,id',  // Ensure product exists
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'specifications' => 'nullable|json',
        ];
    }
}
