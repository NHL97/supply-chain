<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    // Get all purchase orders
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('supplier')->get();  // Eager load supplier data
        return response()->json($purchaseOrders);
    }

    // Get a specific purchase order by ID
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::with('supplier')->findOrFail($id);  // Eager load supplier data
        return response()->json($purchaseOrder);
    }

    // Create a new purchase order
    public function store(PurchaseOrderRequest $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'order_date' => 'required|date',
            'status' => 'required|string',
            'total_amount' => 'required|numeric',
            'terms' => 'nullable|json',
        ]);

        $purchaseOrder = PurchaseOrder::create($validated);

        return response()->json($purchaseOrder, 201);
    }

    // Update an existing purchase order
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'supplier_id' => 'nullable|exists:suppliers,id',
            'order_date' => 'nullable|date',
            'status' => 'nullable|string',
            'total_amount' => 'nullable|numeric',
            'terms' => 'nullable|json',
        ]);

        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->update($validated);

        return response()->json($purchaseOrder);
    }

    // Delete a purchase order
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();

        return response()->json(null, 204);
    }
}
