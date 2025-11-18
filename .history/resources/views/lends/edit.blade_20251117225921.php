@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">Edit Lend</h2>
            <a href="{{ route('lends.index') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- پیام‌ها --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('lends.update', $lend->id) }}" method="POST">
                                @csrf
                            

                                <div class="mb-3">
                                    <label class="form-label">Customer</label>
                                    <select name="customer_id" class="form-select" required>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" @if($lend->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" name="amount" value="{{ old('amount', $lend->amount) }}" step="0.01" class="form-control" required>
                                    @error('amount')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" value="{{ old('date', $lend->date->format('Y-m-d')) }}" class="form-control" required>
                                    @error('date')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control">{{ old('description', $lend->description) }}</textarea>
                                    @error('description')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
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
