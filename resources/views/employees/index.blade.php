@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Employees</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
                Create
            </a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- پیام‌ها --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Created At</th>
                                        <th width="220">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $emp)
                                        <tr>
                                            <td>{{ $emp->id }}</td>
                                            <td>{{ $emp->user->name ?? 'N/A' }}</td>
                                            <td>{{ $emp->position }}</td>
                                            <td>{{ number_format($emp->salary, 2) }}</td>
                                            <td>{{ $emp->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <button onclick="deleteEmployee({{ $emp->id }})" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $employees->links() }}
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
    function deleteEmployee(id) {
        if(confirm('Are you sure you want to delete this employee?')) {
            $.ajax({
                url: '{{ route("employees.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(response) {
                    if(response.status) location.reload();
                }
            });
        }
    }
</script>
@endsection
