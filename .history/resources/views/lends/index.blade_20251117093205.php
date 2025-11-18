@extends('lends.app')
@section('content')

<div class="container">
    <h1>Lends</h1>
    <a href="{{ route('lends.create') }}" class="btn btn-primary mb-3">New Lend</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lends as $lend)
                <tr>
                    <td>{{ $lend->id }}</td>
                    <td>{{ $lend->customer->name }}</td>
                    <td>{{ $lend->amount }}</td>
                    <td>{{ $lend->date->format('d M, Y') }}</td>
                    <td>{{ $lend->description }}</td>
                    <td>
                        <a href="{{ route('lends.edit', $lend->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lends.destroy') }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="ids[]" value="{{ $lend->id }}">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $lends->links() }}
</div>
@endsection
