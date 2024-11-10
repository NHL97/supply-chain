<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all products
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Get a specific product by ID
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Create a new product
    public function store(ProductRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string|unique:products,sku',
            'base_price' => 'required|numeric',
            'specifications' => 'nullable|json',
            'category' => 'required|string',
            'industry_params' => 'nullable|json',
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'sku' => 'nullable|string|unique:products,sku,' . $id,
            'base_price' => 'nullable|numeric',
            'specifications' => 'nullable|json',
            'category' => 'nullable|string',
            'industry_params' => 'nullable|json',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return response()->json($product);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
