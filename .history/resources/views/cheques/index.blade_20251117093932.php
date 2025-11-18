@extends('layouts.articles')

@section('title', 'All Cheques')

@section('content')
<h1 class="mb-3">All Cheques</h1>

<a href="{{ route('cheques.create') }}" class="btn btn-primary mb-3">Add Cheque</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Cheque Number</th>
            <th>Amount</th>
            <th>Bank</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cheques as $cheque)
        <tr>
            <td>{{ $cheque->id }}</td>
            <td>{{ $cheque->customer->name }}</td>
            <td>{{ $cheque->cheque_number }}</td>
            <td>{{ number_format($cheque->amount, 2) }}</td>
            <td>{{ $cheque->bank }}</td>
            <td>{{ \Carbon\Carbon::parse($cheque->due_date)->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('cheques.edit', $cheque->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('cheques.destroy', $cheque->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
