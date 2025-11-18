<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
class DiscountController extends Controller
{
    public function index() {
        return Discount::with(['customer','sale'])->get();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'customer_id' => 'nullable',
            'sale_id'     => 'nullable',
            'amount'      => 'required|numeric',
            'reason'      => 'nullable'
        ]);
        return Discount::create($data);
    }

    public function show(Discount $discount) {
        return $discount->load(['customer','sale']);
    }

    public function update(Request $r, Discount $discount) {
        $discount->update($r->all());
        return $discount;
    }

    public function destroy(Discount $discount) {
        $discount->delete();
        return response()->noContent();
    }
}
