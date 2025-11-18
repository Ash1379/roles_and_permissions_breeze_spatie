{{-- @extends('layouts.app')
@section('content')

<div class="container">
    <h1>Create Lend</h1>

    <form action="{{ route('lends.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Lend</h1>

    <form action="{{ route('lends.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('lends.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
