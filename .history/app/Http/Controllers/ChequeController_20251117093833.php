<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Customer;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    // List all cheques
    public function index()
    {
        $cheques = Cheque::with('customer')->get();
        return view('cheques.index', compact('cheques'));
    }

    // Show form to create a new cheque
    public function create()
    {
        $customers = Customer::all();
        return view('cheques.create', compact('customers'));
    }

    // Store a new cheque
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        Cheque::create($request->all());

        return redirect()->route('cheques.index')->with('success', 'Cheque added successfully!');
    }

    // Show form to edit a cheque
    public function edit($id)
    {
        $cheque = Cheque::findOrFail($id);
        $customers = Customer::all();
        return view('cheques.edit', compact('cheque', 'customers'));
    }

    // Update a cheque
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        $cheque = Cheque::findOrFail($id);
        $cheque->update($request->all());

        return redirect()->route('cheques.index')->with('success', 'Cheque updated successfully!');
    }

    // Delete a cheque
    public function destroy(Request $request)
    {
        $cheque = Cheque::findOrFail($request->id);
        $cheque->delete();

        return redirect()->route('cheques.index')->with('success', 'Cheque deleted successfully!');
    }
}
