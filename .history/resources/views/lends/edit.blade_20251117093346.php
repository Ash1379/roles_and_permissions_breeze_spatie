@extends('layouts.lends')
@section('content')

<div class="container">
    <h1>Edit Lend</h1>

    <form action="{{ route('lends.update', $lend->id) }}" method="POST">
        @csrf
        @method('POST') <!-- Laravel uses POST in your routes for update -->

        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @if($lend->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" value="{{ $lend->amount }}" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ $lend->date->format('Y-m-d') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $lend->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
