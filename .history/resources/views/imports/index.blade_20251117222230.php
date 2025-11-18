@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Imports</h2>
            <a href="{{ route('imports.create') }}" class="btn btn-primary btn-sm">
                Create
            </a>
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
                                        <th>Company</th>
                                        <th>Driver</th>
                                        <th>Product</th>
                                        <th>Litres</th>
                                        <th>Value</th>
                                        <th>Imported At</th>
                                        <th width="180">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($imports as $import)
                                        <tr>
                                            <td>{{ $import->id }}</td>
                                            <td>{{ $import->company->name }}</td>
                                            <td>{{ $import->driver->name ?? '-' }}</td>
                                            <td>{{ $import->product->name }}</td>
                                            <td>{{ $import->litres }}</td>
                                            <td>{{ $import->value ?? '-' }}</td>
                                            <td>{{ optional($import->imported_at)->format('d M, Y') ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('imports.edit', $import->id) }}" class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <button onclick="deleteImport({{ $import->id }})" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $imports->links() }}
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
    function deleteImport(id) {
        if (confirm('Are you sure you want to delete this import?')) {
            $.ajax({
                url: '{{ route("imports.destroy") }}',
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
