@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Cheques</h2>
            <a href="{{ route('cheques.create') }}" class="btn btn-primary btn-sm">Create</a>
        </div>

        <!-- Messages -->
        <x-message />

        <!-- Table -->
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Cheque Number</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th width="220">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cheques as $cheque)
                        <tr>
                            <td>{{ $cheque->id }}</td>
                            <td>{{ $cheque->customer->name }}</td>
                            <td>{{ $cheque->cheque_number }}</td>
                            <td>{{ $cheque->amount }}</td>
                            <td>{{ $cheque->due_date->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('cheques.edit', $cheque->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button onclick="deleteCheque({{ $cheque->id }})" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $cheques->links() }}
        </div>

    </div>
</div>

<!-- Delete Script -->
<script>
    function deleteCheque(id) {
        if(confirm('Are you sure you want to delete this cheque?')) {
            $.ajax({
                url: '{{ route("cheques.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function() {
                    window.location.reload();
                }
            });
        }
    }
</script>
@endsection
