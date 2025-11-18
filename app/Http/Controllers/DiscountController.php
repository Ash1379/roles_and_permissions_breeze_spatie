<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DiscountController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view discount', only: ['index']),
            new Middleware('permission:edit discount', only: ['edit','update']),
            new Middleware('permission:create discount', only: ['create','store']),
            new Middleware('permission:delete discount', only: ['destroy']),
        ];
    }
    public function index()
    {
        $discounts = Discount::with(['customer', 'sale'])->get();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        $customers = Customer::all();
        $sales = Sale::all();
        return view('discounts.create', compact('customers', 'sales'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'sale_id'     => 'nullable|exists:sales,id',
            'amount'      => 'required|numeric',
            'reason'      => 'nullable|string|max:255',
        ]);

        Discount::create($data);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    public function edit(Discount $discount)
    {
        $customers = Customer::all();
        $sales = Sale::all();
        return view('discounts.edit', compact('discount', 'customers', 'sales'));
    }

    public function update(Request $request, Discount $discount)
    {
        $data = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'sale_id'     => 'nullable|exists:sales,id',
            'amount'      => 'required|numeric',
            'reason'      => 'nullable|string|max:255',
        ]);

        $discount->update($data);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids ?? [];
        Discount::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
