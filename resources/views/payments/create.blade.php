@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Create Payment</h2>
            <a href="{{ route('payments.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
        <!-- End Header -->

        <!-- Start Form Card -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('payments.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label>Customer</label>
                                    <select name="customer_id" class="form-control" required>
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id')==$customer->id?'selected':'' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="number" name="amount" step="0.01" value="{{ old('amount') }}" class="form-control" required>
                                    @error('amount')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Method</label>
                                    <input type="text" name="method" value="{{ old('method') }}" class="form-control" required>
                                    @error('method')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Date</label>
                                    <input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
                                    @error('date')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Form Card -->

    </div>
</div>
@endsection
