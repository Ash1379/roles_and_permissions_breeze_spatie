<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\Customer;
use Illuminate\Http\Request;

class LendController extends Controller
{
    // List all lends
    public function index()
    {
        $lends = Lend::with('customer')->latest()->paginate(25);
        return view('lends.index', compact('lends'));
    }

    // Show form to create new lend
    public function create()
    {
        $customers = Customer::all();
        return view('lends.create', compact('customers'));
    }

    // Store new lend
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric',
            'date'        => 'required|date',
            'description' => 'nullable|string',
        ]);

        Lend::create($request->all());

        return redirect()->route('lends.index')->with('success', 'Lend created successfully.');
    }

    // Show form to edit lend
    public function edit(Lend $lend)
    {
        $customers = Customer::all();
        return view('lends.edit', compact('lend', 'customers'));
    }

    // Update lend
    public function update(Request $request, Lend $lend)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric',
            'date'        => 'required|date',
            'description' => 'nullable|string',
        ]);

        $lend->update($request->all());

        return redirect()->route('lends.index')->with('success', 'Lend updated successfully.');
    }

    // Delete lend
    public function destroy(Request $request)
    {
        $ids = $request->ids; // array of IDs for bulk delete
        Lend::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }
}
