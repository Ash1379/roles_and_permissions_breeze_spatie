@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Articles / Create</h2>
            <a href="{{ route('articles.index') }}" class="btn btn-dark btn-sm">Back</a>
        </div>

        <!-- Main Form -->
        <div class="container-fluid py-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror w-50"
                                placeholder="Enter Title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="text" id="text" rows="10"
                                class="form-control w-50"
                                placeholder="Content">{{ old('text') }}</textarea>
                        </div>

                        <!-- Author -->
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" value="{{ old('author') }}"
                                class="form-control @error('author') is-invalid @enderror w-50"
                                placeholder="Author">
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-dark px-4">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
