@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Drivers</h2>
            <a href="{{ route('drivers.create') }}" class="btn btn-secondary btn-sm">Create</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">

            <x-message />

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>License</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr>
                                <td>{{ $driver->id }}</td>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->phone ?? '-' }}</td>
                                <td>{{ $driver->license_number ?? '-' }}</td>
                                <td>{{ $driver->address ?? '-' }}</td>
                                <td>{{ $driver->created_at->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="javascript:void(0);" onclick="deleteDriver({{ $driver->id }})" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $drivers->links() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- End Main Content -->

    </div>
</div>


<script>
    function deleteDriver(id){
        if(confirm('Are you sure you want to delete this driver?')){
            $.ajax({
                url: '{{ route("drivers.destroy") }}',
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
