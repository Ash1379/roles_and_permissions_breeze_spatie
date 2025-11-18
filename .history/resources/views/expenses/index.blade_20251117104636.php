@extends('layouts.app')

@section('content')
<h1>Expenses</h1>
<a href="{{ route('expenses.create') }}" class="btn btn-success mb-3">Add Expense</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
        <tr>
            <td>{{ $expense->id }}</td>
            <td>{{ $expense->title }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->expense_date }}</td>
            <td>{{ $expense->notes }}</td>
            <td>
                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
