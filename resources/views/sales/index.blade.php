@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Sales</h2>
            <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm">Create</a>
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
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Litres</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                        <th>Sold At</th>
                                        <th width="220">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->id }}</td>
                                            <td>{{ $sale->customer->name }}</td>
                                            <td>{{ $sale->product->name }}</td>
                                            <td>{{ $sale->litres }}</td>
                                            <td>{{ $sale->rate }}</td>
                                            <td>{{ $sale->total }}</td>
                                            <td>{{ $sale->sold_at?->format('d M, y H:i') ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <button onclick="deleteSale({{ $sale->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No sales found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $sales->links() }}
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
    function deleteSale(id) {
        if (confirm('Are you sure you want to delete this sale?')) {
            $.ajax({
                url: '{{ route("sales.destroy") }}',
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
