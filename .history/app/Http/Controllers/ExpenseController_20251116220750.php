<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
class ExpenseController extends Controller
{
    public function index() {
        return Expense::all();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'title'=>'required',
            'amount'=>'required|numeric',
            'expense_date'=>'nullable|date',
            'notes'=>'nullable',
        ]);
        return Expense::create($data);
    }

    public function show(Expense $expense) {
        return $expense;
    }

    public function update(Request $r, Expense $expense) {
        $expense->update($r->all());
        return $expense;
    }

    public function destroy(Expense $expense) {
        $expense->delete();
        return response()->noContent();
    }
}
