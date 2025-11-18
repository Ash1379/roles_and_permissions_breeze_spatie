<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

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

    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
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

    public function destroy(Request $request)
    {
        $ids = $request->ids ?? [];
        Expense::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
