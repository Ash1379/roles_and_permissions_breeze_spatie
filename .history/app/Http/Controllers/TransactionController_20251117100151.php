<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // ✔ نمایش لیست تراکنش‌ها
    public function index()
    {
        $transactions = Transaction::latest()->paginate(25);
        return view('backend.transactions.index', compact('transactions'));
    }

    // ✔ فرم ایجاد تراکنش
    public function create()
    {
        return view('backend.transactions.create');
    }

    // ✔ ذخیره تراکنش
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:import,sale,payment,lend,cheque,expense',
            'reference_id' => 'required|integer',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            Transaction::create($request->all());
            return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
        } else {
            return redirect()->route('transactions.create')->withInput()->withErrors($validator);
        }
    }

    // ✔ فرم ویرایش تراکنش
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('backend.transactions.edit', compact('transaction'));
    }

    // ✔ اپدیت تراکنش
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'type' => 'required|in:import,sale,payment,lend,cheque,expense',
            'reference_id' => 'required|integer',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $transaction->update($request->all());
            return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
        } else {
            return redirect()->route('transactions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // ✔ حذف تراکنش
    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if (!$transaction) {
            return response()->json(['status' => false]);
        }

        $transaction->delete();
        return response()->json(['status' => true]);
    }
}
