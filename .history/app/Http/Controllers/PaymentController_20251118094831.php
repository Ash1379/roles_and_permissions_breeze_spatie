<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::latest()->paginate(25);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('payments.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'method' => 'nullable|string',
            'date' => 'required|date',
        ]);

        if ($validator->passes()) {
            Payment::create($request->all());
            return redirect()->route('payments.index')->with('success', 'Payment added successfully');
        } else {
            return redirect()->route('payments.create')->withInput()->withErrors($validator);
        }
    }

    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        $customers = Customer::all();
        return view('payments.edit', compact('payment', 'customers'));
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'method' => 'nullable|string',
            'date' => 'required|date',
        ]);

        if ($validator->passes()) {
            $payment->update($request->all());
            return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
        } else {
            return redirect()->route('payments.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $payment = Payment::find($id);

        if (!$payment) {
            session()->flash('error', 'Payment not found');
            return response()->json(['status' => false]);
        }

        $payment->delete();
        session()->flash('success', 'Payment deleted successfully');
        return response()->json(['status' => true]);
    }
}
