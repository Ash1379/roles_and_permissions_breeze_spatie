@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Roles / Create</h2>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf

                                <!-- Role Name -->
                                <div class="mb-3">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" name="name" class="form-control w-50 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Role">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Permissions -->
                                <div class="row">
                                    @if ($permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="permission-{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}">
                                                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>

                        </div>
                    </div>
                    <!-- End Card -->

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection
