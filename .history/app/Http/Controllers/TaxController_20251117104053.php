<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::all();
        return view('taxes.index', compact('taxes'));
    }

    public function create()
    {
        return view('taxes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'rate'  => 'required|numeric',
        ]);

        Tax::create($data);

        return redirect()->route('taxes.index')->with('success', 'Tax created successfully.');
    }

    public function edit(Tax $tax)
    {
        return view('taxes.edit', compact('tax'));
    }

    public function update(Request $request, Tax $tax)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'rate'  => 'required|numeric',
        ]);

        $tax->update($data);

        return redirect()->route('taxes.index')->with('success', 'Tax updated successfully.');
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids ?? [];
        Tax::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}
