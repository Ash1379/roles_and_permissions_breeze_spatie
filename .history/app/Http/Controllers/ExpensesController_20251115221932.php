<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    // List all expenses
    public function ExpensesShow()
    {
        $expenses = Expenses::orderBy('spent_at', 'desc')->get();
        return view('expenses.index', compact('expenses'));
    }

    // Show create form
    public function ExpensesCreate()
    {
        return view('expenses.create');
    }

    // Store new expense
    public function ExpensesCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'spent_at' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        Expenses::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense recorded successfully!');
    }

    // Show edit form
    public function ExpensesEdit($id)
    {
        $expense = Expenses::findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    // Update expense
    public function ExpensesUpdate(Request $request, $id)
    {
        $expense = Expenses::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'spent_at' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

    // Delete expense
    public function ExpensesDelete($id)
    {
        $expense = Expenses::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
