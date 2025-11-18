@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Reservoirs</h2>
            <a href="{{ route('reservoirs.create') }}" class="btn btn-primary btn-sm">Create</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- پیام‌ها --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Capacity</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($reservoirs as $res)
                                        <tr>
                                            <td>{{ $res->id }}</td>
                                            <td>{{ $res->name }}</td>
                                            <td>{{ $res->location ?? '-' }}</td>
                                            <td>{{ $res->capacity }}</td>
                                            <td>{{ $res->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('reservoirs.edit', $res->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <button onclick="deleteReservoir({{ $res->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $reservoirs->links() }}
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
    function deleteReservoir(id){
        if(confirm('Are you sure you want to delete this reservoir?')){
            $.ajax({
                url: '{{ route("reservoirs.destroy") }}',
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
