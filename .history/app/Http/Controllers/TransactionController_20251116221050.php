<?php
namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index() {
        return Transaction::all();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'type' => 'required',
            'reference_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'transaction_date' => 'nullable|date',
            'notes' => 'nullable'
        ]);

        return Transaction::create($data);
    }

    public function show(Transaction $transaction) {
        return $transaction;
    }

    public function update(Request $r, Transaction $transaction) {
        $transaction->update($r->all());
        return $transaction;
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();
        return response()->noContent();
    }
}
