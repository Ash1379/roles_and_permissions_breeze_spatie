<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // -------------------- Index (List) --------------------
    public function index()
    {
        $products = Product::orderBy('product_type')->paginate(25);
        return view('backend.products.index', compact('products'));
    }

    // -------------------- Create Form --------------------
    public function create()
    {
        return view('backend.products.create');
    }

    // -------------------- Store --------------------
    public function store(Request $r)
    {
        $data = $r->validate([
            'product_type' => 'required|in:petrol,diesel,gas',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    // -------------------- Show (Single Record) --------------------
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.show', compact('product'));
    }

    // -------------------- Edit Form --------------------
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    // -------------------- Update --------------------
    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'product_type' => 'required|in:petrol,diesel,gas',
            'name'         => 'nullable|string|max:255',
            'description'  => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // -------------------- Delete --------------------
    public function destroy(Request $r)
    {
        $id = $r->id;

        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['status' => true, 'message' => 'Deleted']);
    }
}
