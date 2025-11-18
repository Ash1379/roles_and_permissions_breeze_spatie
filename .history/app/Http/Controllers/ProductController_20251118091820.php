<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller
{
    // ✔ نمایش لیست محصولات
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('products.index', compact('products'));
    }

    // ✔ فرم ایجاد محصول
    public function create()
    {
        return view('products.create');
    }

    // ✔ ذخیره محصول جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    // ✔ فرم ویرایش محصول
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // ✔ بروزرسانی محصول
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    // ✔ حذف محصول
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return response()->json(['status' => false]);
        }

        $product->delete();

        return response()->json(['status' => true]);
    }
}
