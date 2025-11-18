@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Roles / Edit</h2>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <!-- Card -->
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <form action="{{ route('roles.update', $role->id) }}" method="post">
                                @csrf
                                @method('PUT') {{-- برای update حتماً method PUT اضافه کنید --}}

                                <!-- Name Field -->
                                <div class="mb-3">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror w-50"
                                        value="{{ old('name', $role->name) }}"
                                        placeholder="Enter Role">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Permissions -->
                                <div class="row mb-3">
                                    @if ($permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3 mb-2">
                                                <div class="form-check">
                                                    <input type="checkbox"
                                                        class="form-check-input"
                                                        id="permission-{{ $permission->id }}"
                                                        name="permissions[]"
                                                        value="{{ $permission->name }}"
                                                        {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-dark px-4">Update</button>

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
