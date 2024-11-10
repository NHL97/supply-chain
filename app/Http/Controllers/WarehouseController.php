<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    // Get all warehouses
    public function index()
    {
        $warehouses = Warehouse::with('location')->get();  // Eager load location data
        return response()->json($warehouses);
    }

    // Get a specific warehouse by ID
    public function show($id)
    {
        $warehouse = Warehouse::with('location')->findOrFail($id);  // Eager load location data
        return response()->json($warehouse);
    }

    // Create a new warehouse
    public function store(WarehouseRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'location_id' => 'required|exists:locations,id',  // Assuming a Location model exists
            'capacity' => 'required|numeric',
            'specifications' => 'nullable|json',
        ]);

        $warehouse = Warehouse::create($validated);

        return response()->json($warehouse, 201);
    }

    // Update an existing warehouse
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'location_id' => 'nullable|exists:locations,id',
            'capacity' => 'nullable|numeric',
            'specifications' => 'nullable|json',
        ]);

        $warehouse = Warehouse::findOrFail($id);
        $warehouse->update($validated);

        return response()->json($warehouse);
    }

    // Delete a warehouse
    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        return response()->json(null, 204);
    }
}
