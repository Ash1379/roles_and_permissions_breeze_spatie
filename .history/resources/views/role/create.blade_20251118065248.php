@extends('layouts.app')

@section('content')
<div class="container-xxl">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center py-3">
        <h2 class="fw-semibold fs-4 text-dark m-0">Roles / Create</h2>

        <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">
            Back
        </a>
    </div>

    <!-- Body -->
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-medium">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="form-control w-50"
                           placeholder="Enter role name">

                    @error('name')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-3 mb-2">
                            <div class="form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="permission-{{ $permission->id }}"
                                       name="permissions[]"
                                       value="{{ $permission->name }}">
                                <label class="form-check-label" for="permission-{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary px-4 py-2 mt-3">
                    Submit
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
