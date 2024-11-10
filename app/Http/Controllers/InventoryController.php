<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Get all inventories
    public function index()
    {
        $inventories = Inventory::with(['product', 'warehouse'])->get();
        return response()->json($inventories);
    }

    // Get a specific inventory by ID
    public function show($id)
    {
        $inventory = Inventory::with(['product', 'warehouse'])->findOrFail($id);
        return response()->json($inventory);
    }

    // Create a new inventory record
    public function store(InventoryRequest $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer',
            'expiry_date' => 'required|date',
            'batch_number' => 'required|string',
            'tracking_data' => 'nullable|json',
        ]);

        $inventory = Inventory::create($validated);

        return response()->json($inventory, 201);
    }

    // Update an existing inventory record
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'warehouse_id' => 'nullable|exists:warehouses,id',
            'quantity' => 'nullable|integer',
            'expiry_date' => 'nullable|date',
            'batch_number' => 'nullable|string',
            'tracking_data' => 'nullable|json',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validated);

        return response()->json($inventory);
    }

    // Delete an inventory record
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return response()->json(null, 204);
    }
}
