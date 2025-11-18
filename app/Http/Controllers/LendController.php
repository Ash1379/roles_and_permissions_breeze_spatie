<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class LendController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view lend', only: ['index']),
            new Middleware('permission:edit lend', only: ['edit','update']),
            new Middleware('permission:create lend', only: ['create','store']),
            new Middleware('permission:delete lend', only: ['destroy']),
        ];
    }
    // Show list of all lends
    public function index()
    {
        $lends = Lend::with('customer')->orderBy('created_at', 'desc')->paginate(25);
        return view('lends.index', compact('lends'));
    }

    // Show form to create a new lend
    public function create()
    {
        $customers = Customer::all();
        return view('lends.create', compact('customers'));
    }

    // Store new lend in DB
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Lend::create($request->all());
        return redirect()->route('lends.index')->with('success', 'Lend created successfully.');
    }

    // Show form to edit existing lend
    public function edit($id)
    {
        $lend = Lend::findOrFail($id);
        $customers = Customer::all();
        return view('lends.edit', compact('lend', 'customers'));
    }

    // Update lend in DB
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $lend = Lend::findOrFail($id);
        $lend->update($request->all());

        return redirect()->route('lends.index')->with('success', 'Lend updated successfully.');
    }

    // Delete lend
    public function destroy(Request $request)
{
    $lend = Lend::find($request->id); // find lend by ID
    if (!$lend) {
        return response()->json(['status' => false, 'message' => 'Lend not found']);
    }

    $lend->delete();

    return response()->json(['status' => true, 'message' => 'Lend deleted successfully']);
}

}
