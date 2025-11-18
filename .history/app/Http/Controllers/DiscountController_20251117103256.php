<?php
namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    // List all discounts
    public function index()
    {
        $discounts = Discount::latest()->paginate(25);
        return view('discounts.list', compact('discounts'));
    }

    // Show create form
    public function create()
    {
        $customers = Customer::all();
        $sales = Sale::all();
        return view('discounts.create', compact('customers','sales'));
    }

    // Store new discount
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable|exists:customers,id',
            'sale_id' => 'nullable|exists:sales,id',
            'amount' => 'required|numeric|min:0',
            'reason' => 'nullable|string|max:255',
        ]);

        if ($validator->passes()) {
            Discount::create($request->only(['customer_id','sale_id','amount','reason']));
            return redirect()->route('discounts.index')->with('success', 'Discount added successfully');
        }

        return redirect()->route('discounts.create')->withInput()->withErrors($validator);
    }

    // Show edit form
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        $customers = Customer::all();
        $sales = Sale::all();
        return view('discounts.edit', compact('discount','customers','sales'));
    }

    // Update discount
    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable|exists:customers,id',
            'sale_id' => 'nullable|exists:sales,id',
            'amount' => 'required|numeric|min:0',
            'reason' => 'nullable|string|max:255',
        ]);

        if ($validator->passes()) {
            $discount->update($request->only(['customer_id','sale_id','amount','reason']));
            return redirect()->route('discounts.index')->with('success', 'Discount updated successfully');
        }

        return redirect()->route('discounts.edit', $id)->withInput()->withErrors($validator);
    }

    // Delete discount
    public function destroy(Request $request)
    {
        $discount = Discount::find($request->id);

        if(!$discount){
            return response()->json(['status' => false, 'message' => 'Discount not found']);
        }

        $discount->delete();
        return response()->json(['status' => true, 'message' => 'Discount deleted successfully']);
    }
}
