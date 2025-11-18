<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'            => 'required|in:import,sale,payment,lend,cheque,expense',
            'reference_id'    => 'required|integer',
            'amount'          => 'required|numeric',
            'transaction_date'=> 'nullable|date',
            'notes'           => 'nullable|string',
        ]);

        Transaction::create($data);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'type'            => 'required|in:import,sale,payment,lend,cheque,expense',
            'reference_id'    => 'required|integer',
            'amount'          => 'required|numeric',
            'transaction_date'=> 'nullable|date',
            'notes'           => 'nullable|string',
        ]);

        $transaction->update($data);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids ?? [];
        Transaction::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
