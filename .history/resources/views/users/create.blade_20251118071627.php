@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">User / Create</h2>
            <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror w-50"
                                   placeholder="Enter Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror w-50"
                                   placeholder="Enter Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror w-50"
                                   placeholder="Enter Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password"
                                   class="form-control @error('confirm_password') is-invalid @enderror w-50"
                                   placeholder="Confirm your password">
                            @error('confirm_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Roles --}}
                        <div class="mb-3 row">
                            @if ($roles->isNotEmpty())
                                @foreach($roles as $role)
                                    <div class="col-md-3 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   id="role-{{ $role->id }}"
                                                   name="role[]"
                                                   value="{{ $role->name }}">
                                            <label class="form-check-label" for="role-{{ $role->id }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-dark">Create</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
