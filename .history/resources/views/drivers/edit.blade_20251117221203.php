@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Drivers / Edit</h2>
            <a href="{{ route('drivers.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('drivers.update', $driver->id) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name', $driver->name) }}" class="form-control w-50">
                            @error('name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $driver->phone) }}" class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">License Number</label>
                            <input type="text" name="license_number" value="{{ old('license_number', $driver->license_number) }}" class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" value="{{ old('address', $driver->address) }}" class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control w-50" rows="5">{{ old('description', $driver->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection
