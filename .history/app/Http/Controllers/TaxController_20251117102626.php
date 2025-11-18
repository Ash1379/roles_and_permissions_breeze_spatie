<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    // Display list of taxes
    public function index()
    {
        $taxes = Tax::latest()->paginate(25);
        return view('taxes.list', compact('taxes'));
    }

    // Show create form
    public function create()
    {
        return view('taxes.create');
    }

    // Store new tax
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'rate' => 'required|numeric|min:0',
        ]);

        if ($validator->passes()) {
            Tax::create($request->only(['title','rate']));
            return redirect()->route('taxes.index')->with('success', 'Tax added successfully');
        } else {
            return redirect()->route('taxes.create')->withInput()->withErrors($validator);
        }
    }

    // Show edit form
    public function edit($id)
    {
        $tax = Tax::findOrFail($id);
        return view('taxes.edit', compact('tax'));
    }

    // Update existing tax
    public function update(Request $request, $id)
    {
        $tax = Tax::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'rate' => 'required|numeric|min:0',
        ]);

        if ($validator->passes()) {
            $tax->update($request->only(['title','rate']));
            return redirect()->route('taxes.index')->with('success', 'Tax updated successfully');
        } else {
            return redirect()->route('taxes.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // Delete tax
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tax = Tax::find($id);

        if(!$tax){
            return response()->json(['status' => false, 'message' => 'Tax not found']);
        }

        $tax->delete();
        return response()->json(['status' => true, 'message' => 'Tax deleted successfully']);
    }
}
