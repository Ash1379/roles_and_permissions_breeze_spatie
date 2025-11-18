<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✔ نمایش لیست
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('backend.products.index', compact('products'));
    }

    // ✔ فرم ایجاد
    public function create()
    {
        return view('backend.products.create');
    }

    // ✔ ذخیره محصول
    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success','Product created successfully.');
    }

    // ✔ فرم ویرایش
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    // ✔ اپدیت
    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success','Product updated successfully.');
    }

    // ✔ حذف
    public function destroy(Request $r)
    {
        Product::findOrFail($r->id)->delete();

        return response()->json(['status' => 'success']);
    }
}
