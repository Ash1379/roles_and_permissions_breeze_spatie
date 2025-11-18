@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Create Reservoir</h2>
            <a href="{{ route('reservoirs.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('reservoirs.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control w-50" value="{{ old('name') }}">
                                    @error('name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control w-50" value="{{ old('location') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Capacity</label>
                                    <input type="number" name="capacity" class="form-control w-50" value="{{ old('capacity') }}">
                                    @error('capacity')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Submit</button>
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
