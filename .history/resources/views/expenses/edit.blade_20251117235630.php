@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Expenses / Edit</h2>
            <a href="{{ route('expenses.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- Messages --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                                @csrf
                

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title"
                                           value="{{ old('title', $expense->title) }}"
                                           class="form-control w-50">
                                    @error('title')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Amount -->
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" id="amount"
                                           value="{{ old('amount', $expense->amount) }}"
                                           class="form-control w-50">
                                    @error('amount')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Expense Date -->
                                <div class="mb-3">
                                    <label for="expense_date" class="form-label">Date</label>
                                    <input type="date" name="expense_date" id="expense_date"
                                           value="{{ old('expense_date', $expense->expense_date->format('Y-m-d')) }}"
                                           class="form-control w-50">
                                    @error('expense_date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Notes -->
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea name="notes" id="notes" rows="3" class="form-control w-50">{{ old('notes', $expense->notes) }}</textarea>
                                    @error('notes')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update Expense</button>

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
