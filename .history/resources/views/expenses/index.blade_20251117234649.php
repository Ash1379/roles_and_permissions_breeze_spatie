@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Expenses</h2>
            <a href="{{ route('expenses.create') }}" class="btn btn-primary btn-sm">Add Expense</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- Messages --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
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
                                            <td>{{ $expense->expense_date ? $expense->expense_date->format('d M, Y') : '-' }}</td>
                                            <td>{{ $expense->notes ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <button onclick="deleteExpense({{ $expense->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $expenses->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>

<script>
    function deleteExpense(id){
        if(confirm('Are you sure you want to delete this expense?')){
            $.ajax({
                url: '{{ route("expenses.destroy") }}',
                type: 'DELETE',
                data: {id:id},
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(response){
                    if(response.status) location.reload();
                }
            });
        }
    }
</script>
@endsection
