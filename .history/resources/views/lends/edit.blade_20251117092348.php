{{-- @extends('layouts.app')
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
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Lend</h1>

    <form action="{{ route('lends.update', $lend->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $lend->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ $lend->amount }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ $lend->date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $lend->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('lends.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
