<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class TaxController extends Controller
{
    public function index() {
        return Tax::all();
    }

    public function store(Request $r) {
        $data = $r->validate([
            'title' => 'required',
            'rate'  => 'required|numeric'
        ]);
        return Tax::create($data);
    }

    public function show(Tax $tax) {
        return $tax;
    }

    public function update(Request $r, Tax $tax) {
        $tax->update($r->all());
        return $tax;
    }

    public function destroy(Tax $tax) {
        $tax->delete();
        return response()->noContent();
    }
}
