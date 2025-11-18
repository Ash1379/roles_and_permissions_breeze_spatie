<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Transactions / Create
            </h2>
            <a href="{{ route('transactions.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('transactions.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="text-sm font-medium">Type</label>
                            <div class="my-3">
                                <select name="type" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                    <option value="">Select Type</option>
                                    @foreach(['import','sale','payment','lend','cheque','expense'] as $type)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('type')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Reference ID</label>
                            <div class="my-3">
                                <input type="number" name="reference_id" value="{{ old('reference_id') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('reference_id')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Amount</label>
                            <div class="my-3">
                                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('amount')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Transaction Date</label>
                            <div class="my-3">
                                <input type="date" name="transaction_date" value="{{ old('transaction_date') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('transaction_date')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Notes</label>
                            <div class="my-3">
                                <textarea name="notes" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">{{ old('notes') }}</textarea>
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
