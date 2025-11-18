@extends('layouts.articles')

@section('title', 'Edit Cheque')

@section('content')
<h1>Edit Cheque</h1>

<form action="{{ route('cheques.update', $cheque->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id" class="form-control">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $cheque->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="cheque_number">Cheque Number</label>
        <input type="text" name="cheque_number" id="cheque_number" value="{{ $cheque->cheque_number }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="amount">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" value="{{ $cheque->amount }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="bank">Bank</label>
        <input type="text" name="bank" id="bank" value="{{ $cheque->bank }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" value="{{ $cheque->due_date->format('Y-m-d') }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
