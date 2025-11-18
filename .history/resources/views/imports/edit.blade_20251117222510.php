@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Edit Import</h2>
            <a href="{{ route('imports.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('imports.update', $import->id) }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    <select name="company_id" class="form-select w-50">
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ old('company_id', $import->company_id) == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('company_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Driver</label>
                                    <select name="driver_id" class="form-select w-50">
                                        <option value="">Select Driver</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{ $driver->id }}" {{ old('driver_id', $import->driver_id) == $driver->id ? 'selected' : '' }}>
                                                {{ $driver->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product</label>
                                    <select name="product_id" class="form-select w-50">
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ old('product_id', $import->product_id) == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Litres</label>
                                    <input type="text" name="litres" value="{{ old('litres', $import->litres) }}" class="form-control w-50">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Value</label>
                                    <input type="text" name="value" value="{{ old('value', $import->value) }}" class="form-control w-50">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Serial No</label>
                                    <input type="text" name="serial_no" value="{{ old('serial_no', $import->serial_no) }}" class="form-control w-50">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Imported At</label>
                                    <input type="datetime-local" name="imported_at" value="{{ old('imported_at', $import->imported_at ? $import->imported_at->format('Y-m-d\TH:i') : '') }}" class="form-control w-50">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea name="notes" class="form-control w-50">{{ old('notes', $import->notes) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
