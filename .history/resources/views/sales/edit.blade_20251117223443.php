@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Edit Sale</h2>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('sales.update', $sale->id) }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Customer</label>
                                    <select name="customer_id" class="form-select w-50">
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id', $sale->customer_id)==$customer->id?'selected':'' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product</label>
                                    <select name="product_id" class="form-select w-50">
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ old('product_id', $sale->product_id)==$product->id?'selected':'' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Litres</label>
                                    <input type="number" step="0.001" name="litres" value="{{ old('litres', $sale->litres) }}" class="form-control w-50">
                                    @error('litres')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Rate</label>
                                    <input type="number" step="0.01" name="rate" value="{{ old('rate', $sale->rate) }}" class="form-control w-50">
                                    @error('rate')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Total</label>
                                    <input type="number" step="0.01" name="total" value="{{ old('total', $sale->total) }}" class="form-control w-50">
                                    @error('total')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sold At</label>
                                    <input type="datetime-local" name="sold_at" value="{{ old('sold_at', $sale->sold_at ? $sale->sold_at->format('Y-m-d\TH:i') : '') }}" class="form-control w-50">
                                    @error('sold_at')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection
