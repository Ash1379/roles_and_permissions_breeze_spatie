@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Products / Edit</h2>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- پیام‌ها --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('products.update', $product->id) }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control w-50" value="{{ old('name', $product->name) }}">
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Unit</label>
                                    <input type="text" name="unit" class="form-control w-50" value="{{ old('unit', $product->unit) }}">
                                    @error('unit')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control w-50" value="{{ old('price', $product->price) }}">
                                    @error('price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control w-50" rows="5">{{ old('description', $product->description) }}</textarea>
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
