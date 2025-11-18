@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Users</h2>
            <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm">Create</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <x-message></x-message>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="150">Created At</th>
                            <th width="220">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, y') }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-dark btn-sm me-2">Edit</a>
                                        <button type="button" onclick="deleteUser({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="my-3">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    function deleteUser(id){
        if(confirm("Are you sure you want to delete this user?")){
            $.ajax({
                url: '{{ route("users.destroy") }}',
                type: 'DELETE',
                data: {id:id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response){
                    window.location.href = '{{ route("users.index") }}';
                }
            });
        }
    }
</script>
@endsection
