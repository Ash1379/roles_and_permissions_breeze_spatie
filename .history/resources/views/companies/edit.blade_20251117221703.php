@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Companies / Edit</h2>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('companies.update', $company->id) }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-control w-50">
                            @error('name')<p class="text-danger fw-medium mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="form-control w-50">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" value="{{ old('address', $company->address) }}" class="form-control w-50">
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
