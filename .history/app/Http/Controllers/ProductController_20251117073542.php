<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $products = Product::orderBy('product_type')->paginate(25);
        return view('backend.products.index', compact('products'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('products.create');
    }

    // ذخیره
    public function store(Request $r)
    {
        $data = $r->validate([
            'product_type' => 'required|in:petrol,diesel,gas',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        Product::create($data);
        return redirect()->route('products.index')->with('success','Product created');
    }

    // edit, update, destroy مشابه بالا — طبق الگوی RESTful
}
