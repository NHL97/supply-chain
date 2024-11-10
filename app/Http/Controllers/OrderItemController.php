<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Get all order items
    public function index()
    {
        $orderItems = OrderItem::with(['purchaseOrder', 'product'])->get();  // Eager load related data
        return response()->json($orderItems);
    }

    // Get a specific order item by ID
    public function show($id)
    {
        $orderItem = OrderItem::with(['purchaseOrder', 'product'])->findOrFail($id);  // Eager load related data
        return response()->json($orderItem);
    }

    // Create a new order item
    public function store(OrderItemRequest $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:purchase_orders,id',  // Ensure order exists
            'product_id' => 'required|exists:products,id',  // Ensure product exists
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        $orderItem = OrderItem::create($validated);

        return response()->json($orderItem, 201);
    }

    // Update an existing order item
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_id' => 'nullable|exists:purchase_orders,id',
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'specifications' => 'nullable|json',
        ]);

        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($validated);

        return response()->json($orderItem);
    }

    // Delete an order item
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json(null, 204);
    }
}
