<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Imports / Edit
        </h2>
        <a href="{{ route('imports.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('imports.update', $import->id) }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label class="text-sm font-medium">Company</label>
                            <select name="company_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id', $import->company_id) == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Driver</label>
                            <select name="driver_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ old('driver_id', $import->driver_id) == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Product</label>
                            <select name="product_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $import->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Litres</label>
                            <input type="text" name="litres" value="{{ old('litres', $import->litres) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Value</label>
                            <input type="text" name="value" value="{{ old('value', $import->value) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Serial No</label>
                            <input type="text" name="serial_no" value="{{ old('serial_no', $import->serial_no) }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Imported At</label>
                            <input type="datetime-local" name="imported_at" value="{{ old('imported_at', $import->imported_at ? $import->imported_at->format('Y-m-d\TH:i') : '') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Notes</label>
                            <textarea name="notes" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">{{ old('notes', $import->notes) }}</textarea>
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
