@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Permissions / Create</h2>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Permission Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control w-50" placeholder="Enter Permission Name">
                            @error('name')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection
