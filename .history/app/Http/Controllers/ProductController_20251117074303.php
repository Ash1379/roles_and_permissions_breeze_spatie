<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List Page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(15);
        return view('backend.products.index', compact('products'));
    }

    // Create Page
    public function create()
    {
        return view('backend.products.create');
    }

    // Store Product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_type' => 'required|in:petrol,diesel,gas',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Edit Page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    // Update Product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_type' => 'required|in:petrol,diesel,gas',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete Product (AJAX)
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();

        return response()->json(['success' => true]);
    }
}
