<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'contact_info' => 'nullable|json',
            'industry_specific' => 'nullable|json'
        ]);

        $supplier = Supplier::create($validated);
        return response()->json(['message' => 'Supplier created successfully', 'data' => $supplier], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $supplier->load('products', 'purchaseOrders');
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'contact_info' => 'nullable|json',
            'industry_specific' => 'nullable|json'
        ]);

        $supplier->update($validated);
        return response()->json(['message' => 'Supplier updated successfully', 'data' => $supplier]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        if ($supplier->purchaseOrders()->exists()) {
            return response()->json(['message' => 'Supplier cannot be deleted because it has active purchase orders.'], 400);
        }

        $supplier->delete();
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}

