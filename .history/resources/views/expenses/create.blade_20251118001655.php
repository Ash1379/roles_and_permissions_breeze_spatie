@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Expenses / Create</h2>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('expenses.store') }}" method="post">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control w-50">
                            @error('title')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Amount -->
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="form-control w-50">
                            @error('amount')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Expense Date -->
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="expense_date" value="{{ old('expense_date') }}" class="form-control w-50">
                            @error('expense_date')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" class="form-control w-50" rows="5">{{ old('notes') }}</textarea>
                            @error('notes')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection
