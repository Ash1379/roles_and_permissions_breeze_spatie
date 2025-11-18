@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Customers</h2>
            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
                Create
            </a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Created At</th>
                                        <th width="200">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone ?? '-' }}</td>
                                            <td>{{ $customer->address ?? '-' }}</td>
                                            <td>{{ $customer->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <button onclick="deleteCustomer({{ $customer->id }})" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $customers->links() }}
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
    function deleteCustomer(id) {
        if (confirm('Are you sure you want to delete this customer?')) {
            $.ajax({
                url: '{{ route("customers.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(response) {
                    if(response.status) window.location.reload();
                }
            });
        }
    }
</script>
@endsection
