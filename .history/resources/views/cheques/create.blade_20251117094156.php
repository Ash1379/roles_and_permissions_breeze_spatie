@extends('layouts.lends')



@section('content')
<h1>Add New Cheque</h1>

<form action="{{ route('cheques.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id" class="form-control">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="cheque_number">Cheque Number</label>
        <input type="text" name="cheque_number" id="cheque_number" class="form-control">
    </div>

    <div class="mb-3">
        <label for="amount">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" class="form-control">
    </div>

    <div class="mb-3">
        <label for="bank">Bank</label>
        <input type="text" name="bank" id="bank" class="form-control">
    </div>

    <div class="mb-3">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
