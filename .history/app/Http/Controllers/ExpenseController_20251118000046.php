<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    // Display all expenses
    public function index()
    {
        $expenses = Expense::orderBy('expense_date', 'desc')->paginate(10); // Pagination example
        return view('expenses.index', compact('expenses'));
    }

    // Show create form
    public function create()
    {
        return view('expenses.create');
    }

    // Store new expense
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'amount'       => 'required|numeric',
            'expense_date' => 'nullable|date',
            'notes'        => 'nullable|string',
        ]);

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    // Show edit form
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    // Update existing expense
    public function update(Request $request, Expense $id)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'amount'       => 'required|numeric',
            'expense_date' => 'nullable|date',
            'notes'        => 'nullable|string',
        ]);

        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    // Delete one or multiple expenses (AJAX)
    public function destroy(Request $request)
    {
        $ids = $request->ids ?? []; // expecting array of ids
        Expense::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }
}
