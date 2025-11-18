@extends('layouts.app')

@section('content')
<h1>Discounts</h1>
<a href="{{ route('discounts.create') }}" class="btn btn-success mb-3">Add Discount</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Sale</th>
            <th>Amount</th>
            <th>Reason</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($discounts as $discount)
        <tr>
            <td>{{ $discount->id }}</td>
            <td>{{ $discount->customer->name ?? '-' }}</td>
            <td>{{ $discount->sale->id ?? '-' }}</td>
            <td>{{ $discount->amount }}</td>
            <td>{{ $discount->reason }}</td>
            <td>
                <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
