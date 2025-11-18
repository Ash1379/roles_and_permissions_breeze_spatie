@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Roles</h2>
            <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-sm">Create</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">

            <x-message />

            <div class="card">
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th width="150">Created At</th>
                                <th width="220">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>

                                    <td>
                                        {{ $role->permissions->pluck('name')->implode(', ') }}
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, y') }}</td>

                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                           class="btn btn-sm btn-primary">Edit</a>

                                        <a href="javascript:void(0);"
                                           onclick="deleteRole({{ $role->id }})"
                                           class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $roles->links() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function deleteRole(id){
        if(confirm("Are you sure you want to delete this role?")){
            $.ajax({
                url: '{{ route("roles.destroy") }}',
                type: 'DELETE',
                data: {id:id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response){
                    window.location.href = '{{ route("roles.index") }}';
                }
            });
        }
    }
</script>

@endsection
س
