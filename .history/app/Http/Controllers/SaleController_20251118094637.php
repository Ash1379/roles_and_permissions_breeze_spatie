<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SaleController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::latest()->paginate(25);
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'litres' => 'required|numeric',
            'rate' => 'required|numeric',
            'total' => 'required|numeric',
            'sold_at' => 'nullable|date',
        ]);

        if ($validator->passes()) {
            Sale::create($request->all());
            return redirect()->route('sales.index')->with('success', 'Sale added successfully');
        } else {
            return redirect()->route('sales.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = Sale::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sale = Sale::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'litres' => 'required|numeric',
            'rate' => 'required|numeric',
            'total' => 'required|numeric',
            'sold_at' => 'nullable|date',
        ]);

        if ($validator->passes()) {
            $sale->update($request->all());
            return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
        } else {
            return redirect()->route('sales.edit', $id)->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $sale = Sale::find($id);

        if (!$sale) {
            session()->flash('error', 'Sale not found');
            return response()->json(['status' => false]);
        }

        $sale->delete();
        session()->flash('success', 'Sale deleted successfully');
        return response()->json(['status' => true]);
    }
}
