<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ChequeController extends Controller implements HasMiddleware
{
        public static function middleware(): array
    {
        return [
            new Middleware('permission:view cheques', only: ['index']),
            new Middleware('permission:edit cheques', only: ['edit','update']),
            new Middleware('permission:create cheques', only: ['create','store']),
            new Middleware('permission:delete cheques', only: ['destroy']),
        ];
    }
    // ✔ نمایش لیست چک‌ها
    public function index()
    {
        $cheques = Cheque::latest()->paginate(25);
        return view('cheques.index', compact('cheques'));
    }

    // ✔ فرم ایجاد
    public function create()
    {
        $customers = Customer::all();
        return view('cheques.create', compact('customers'));
    }

    // ✔ ذخیره چک جدید
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        if ($validator->passes()) {
            Cheque::create($request->all());
            return redirect()->route('cheques.index')->with('success', 'Cheque created successfully.');
        } else {
            return redirect()->route('cheques.create')->withInput()->withErrors($validator);
        }
    }

    // ✔ فرم ویرایش
    public function edit($id)
    {
        $cheque = Cheque::findOrFail($id);
        $customers = Customer::all();
        return view('cheques.edit', compact('cheque', 'customers'));
    }

    // ✔ اپدیت چک
    public function update(Request $request, $id)
    {
        $cheque = Cheque::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        if ($validator->passes()) {
            $cheque->update($request->all());
            return redirect()->route('cheques.index')->with('success', 'Cheque updated successfully.');
        } else {
            return redirect()->route('cheques.edit', $id)->withInput()->withErrors($validator);
        }
    }

    // ✔ حذف چک
    public function destroy(Request $request)
    {
        $cheque = Cheque::find($request->id);

        if (!$cheque) {
            return response()->json(['status' => false]);
        }

        $cheque->delete();
        return response()->json(['status' => true]);
    }
}
