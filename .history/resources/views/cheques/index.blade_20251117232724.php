@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Companies</h2>
            <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm">Create</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <x-message></x-message>

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->phone ?? '-' }}</td>
                                <td>{{ $company->address ?? '-' }}</td>
                                <td>{{ $company->created_at->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="deleteCompany({{ $company->id }})" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>

<script>
    function deleteCompany(id){
        if(confirm('Are you sure you want to delete this company?')){
            $.ajax({
                url: '{{ route("companies.destroy") }}',
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
