@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Permissions</h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-secondary btn-sm">Create</a>
        </div>

        <div class="container-fluid py-4">

            <x-message />

            <div class="card">
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th width="150">Created At</th>
                                <th width="180">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <a href="javascript:void(0);" onclick="deletePermission({{ $permission->id }})"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $permissions->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function deletePermission(id) {
        if (confirm("Are you sure you want to delete this permission?")) {
            $.ajax({
                url: '{{ route("permissions.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(response) {
                    location.reload();
                }
            });
        }
    }
</script>
@endsection
