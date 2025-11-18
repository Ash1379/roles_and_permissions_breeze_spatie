<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Payments / Edit
            </h2>
            <a href="{{ route('payments.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('payments.update', $payment->id) }}" method="post">
                        @csrf

                        <div class="my-3">
                            <label class="text-sm font-medium">Customer</label>
                            <select name="customer_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $payment->customer_id)==$customer->id?'selected':'' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Amount</label>
                            <input type="number" step="0.01" name="amount" value="{{ old('amount', $payment->amount) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('amount')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Method</label>
                            <input type="text" name="method" value="{{ old('method', $payment->method) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('method')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Date</label>
                            <input type="date" name="date" value="{{ old('date', $payment->date->format('Y-m-d')) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('date')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
