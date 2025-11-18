@extends('layouts.app')

@section('content')

<div class="container mt-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Roles / Create</h2>

        <a href="{{ route('permissions.index') }}" class="btn btn-dark btn-sm">
            Back
        </a>
    </div>

    {{-- Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                {{-- Name Field --}}
                <div class="mb-3">
                    <label class="form-label">Role Name</label>
                    <input  value="{{ old('name') }}"
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter Role">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Permissions --}}
                <div class="row">
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $permission)
                            <div class="col-md-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="permission-{{ $permission->id }}"
                                           name="permissions[]"
                                           value="{{ $permission->name }}">

                                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-dark px-4">Submit</button>

            </form>

        </div>
    </div>

</div>

@endsection
