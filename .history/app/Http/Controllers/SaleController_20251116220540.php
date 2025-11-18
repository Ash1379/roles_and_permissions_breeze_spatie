<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
class SaleController extends Controller
{
    public function index() {
        return Sale::with(['customer','product'])->get();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'customer_id'=>'required',
            'product_id'=>'required',
            'litres'=>'required|numeric',
            'rate'=>'required|numeric',
            'total'=>'required|numeric',
            'sold_at'=>'nullable|date',
        ]);
        return Sale::create($data);
    }

    public function show(Sale $sale) {
        return $sale->load(['customer','product']);
    }

    public function update(Request $r, Sale $sale) {
        $sale->update($r->all());
        return $sale;
    }

    public function destroy(Sale $sale) {
        $sale->delete();
        return response()->noContent();
    }
}
