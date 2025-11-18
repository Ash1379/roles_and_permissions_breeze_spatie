@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Lends</h2>
            <a href="{{ route('lends.create') }}" class="btn btn-primary btn-sm">New Lend</a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
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
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th width="220">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lends as $lend)
                                        <tr>
                                            <td>{{ $lend->id }}</td>
                                            <td>{{ $lend->customer->name }}</td>
                                            <td>{{ $lend->amount }}</td>
                                            <td>{{ $lend->date->format('d M, Y') }}</td>

                                            <td>{{ $lend->description }}</td>
                                            <td>
                                                <a href="{{ route('lends.edit', $lend->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <button onclick="deleteLend({{ $lend->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $lends->links() }}
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
    function deleteLend(id) {
        if(confirm('Are you sure you want to delete this lend?')) {
            $.ajax({
                url: '{{ route("lends.destroy") }}',
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
