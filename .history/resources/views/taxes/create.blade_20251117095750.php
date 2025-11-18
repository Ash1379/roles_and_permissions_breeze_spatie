<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Cheques / Create
            </h2>
            <a href="{{ route('cheques.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('cheques.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="text-sm font-medium">Customer</label>
                            <div class="my-3">
                                <select name="customer_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Cheque Number</label>
                            <div class="my-3">
                                <input type="text" name="cheque_number" value="{{ old('cheque_number') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('cheque_number')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Amount</label>
                            <div class="my-3">
                                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('amount')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Bank</label>
                            <div class="my-3">
                                <input type="text" name="bank" value="{{ old('bank') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('bank')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <label class="text-sm font-medium">Due Date</label>
                            <div class="my-3">
                                <input type="date" name="due_date" value="{{ old('due_date') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                @error('due_date')<p class="text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
