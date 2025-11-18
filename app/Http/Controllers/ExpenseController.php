<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ExpenseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view expense', only: ['index']),
            new Middleware('permission:edit expense', only: ['edit','update']),
            new Middleware('permission:create expense', only: ['create','store']),
            new Middleware('permission:delete expense', only: ['destroy']),
        ];
    }
    // نمایش همه هزینه‌ها
    public function index()
    {
        $expenses = Expense::latest()->paginate(20);
        return view('expenses.index', compact('expenses'));
    }

    // فرم ایجاد هزینه جدید
    public function create()
    {
        return view('expenses.create');
    }

    // ذخیره هزینه جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'amount'       => 'required|numeric',
            'expense_date' => 'nullable|date',
            'notes'        => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('expenses.create')
                ->withErrors($validator)
                ->withInput();
        }

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    // فرم ویرایش هزینه
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));
    }

    // بروزرسانی هزینه
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'amount'       => 'required|numeric',
            'expense_date' => 'nullable|date',
            'notes'        => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('expenses.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    // حذف هزینه
    public function destroy(Request $request)
    {
        $expense = Expense::find($request->id);

        if (!$expense) {
            return response()->json(['status' => false]);
        }

        $expense->delete();
        return response()->json(['status' => true]);
    }
}
