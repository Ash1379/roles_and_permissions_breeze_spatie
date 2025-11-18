<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CustomerController extends Controller
{
    // نمایش لیست مشتریان
    public function index()
    {
        $customers = Customer::latest()->paginate(20);
        return view('customers.index', compact('customers'));
    }

    // فرم ایجاد مشتری
    public function create()
    {
        return view('customers.create');
    }

    // ذخیره مشتری جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('customers.create')
                ->withErrors($validator)
                ->withInput();
        }

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // فرم ویرایش مشتری
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // بروزرسانی مشتری
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('customers.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // حذف مشتری
    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);

        if (!$customer) {
            return response()->json(['status' => false]);
        }

        $customer->delete();
        return response()->json(['status' => true]);
    }
}
