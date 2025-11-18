<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Customer;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    // نمایش لیست چک‌ها
    public function index()
    {
        $cheques = Cheque::latest()->paginate(20);
        return view('backend.cheques.index', compact('cheques'));
    }

    // فرم ایجاد
    public function create()
    {
        $customers = Customer::all();
        return view('backend.cheques.create', compact('customers'));
    }

    // ذخیره چک جدید
    public function store(Request $r)
    {
        $data = $r->validate([
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        Cheque::create($data);

        return redirect()
            ->route('cheques.index')
            ->with('success', 'Cheque created successfully.');
    }

    // فرم ویرایش
    public function edit($id)
    {
        $cheque = Cheque::findOrFail($id);
        $customers = Customer::all();
        return view('backend.cheques.edit', compact('cheque', 'customers'));
    }

    // آپدیت چک
    public function update(Request $r, $id)
    {
        $data = $r->validate([
            'customer_id' => 'required|exists:customers,id',
            'cheque_number' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bank' => 'nullable|string|max:255',
            'due_date' => 'required|date',
        ]);

        $cheque = Cheque::findOrFail($id);
        $cheque->update($data);

        return redirect()
            ->route('cheques.index')
            ->with('success', 'Cheque updated successfully.');
    }

    // حذف چک
    public function destroy(Request $r)
    {
        Cheque::findOrFail($r->id)->delete();
        return response()->json(['status' => 'success']);
    }
}
