<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Sales / Edit
            </h2>
            <a href="{{ route('sales.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('sales.update', $sale->id) }}" method="post">
                        @csrf

                        <div class="my-3">
                            <label class="text-sm font-medium">Customer</label>
                            <select name="customer_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $sale->customer_id)==$customer->id?'selected':'' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Product</label>
                            <select name="product_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $sale->product_id)==$product->id?'selected':'' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Litres</label>
                            <input type="number" step="0.001" name="litres" value="{{ old('litres', $sale->litres) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('litres')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Rate</label>
                            <input type="number" step="0.01" name="rate" value="{{ old('rate', $sale->rate) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('rate')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Total</label>
                            <input type="number" step="0.01" name="total" value="{{ old('total', $sale->total) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('total')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="my-3">
                            <label class="text-sm font-medium">Sold At</label>
                            <input type="datetime-local" name="sold_at" value="{{ old('sold_at', $sale->sold_at ? $sale->sold_at->format('Y-m-d\TH:i') : '') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('sold_at')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
