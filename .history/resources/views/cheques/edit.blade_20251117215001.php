@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Cheques / Edit</h2>
            <a href="{{ route('cheques.index') }}" class="btn btn-secondary btn-sm">
                Back
            </a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('cheques.update', $cheque->id) }}" method="post">
                                @csrf
                              

                                <div class="mb-3">
                                    <label for="customer_id" class="form-label">Customer</label>
                                    <select name="customer_id" id="customer_id" class="form-select w-50">
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ old('customer_id', $cheque->customer_id) == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cheque_number" class="form-label">Cheque Number</label>
                                    <input type="text" name="cheque_number" id="cheque_number"
                                           value="{{ old('cheque_number', $cheque->cheque_number) }}"
                                           class="form-control w-50">
                                    @error('cheque_number')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" id="amount"
                                           value="{{ old('amount', $cheque->amount) }}"
                                           class="form-control w-50">
                                    @error('amount')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="bank" class="form-label">Bank</label>
                                    <input type="text" name="bank" id="bank"
                                           value="{{ old('bank', $cheque->bank) }}"
                                           class="form-control w-50">
                                    @error('bank')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" name="due_date" id="due_date"
                                           value="{{ old('due_date', $cheque->due_date->format('Y-m-d')) }}"
                                           class="form-control w-50">
                                    @error('due_date')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>

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
