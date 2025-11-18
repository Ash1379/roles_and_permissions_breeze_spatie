<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Products / Edit
            </h2>
            <a href="{{ route('products.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update',$product->id) }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label class="text-sm font-medium">Name</label>
                            <input type="text" name="name" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('name', $product->name) }}">
                            @error('name')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Unit</label>
                            <input type="text" name="unit" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('unit', $product->unit) }}">
                            @error('unit')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Price</label>
                            <input type="number" step="0.01" name="price" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('price', $product->price) }}">
                            @error('price')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Description</label>
                            <textarea name="description" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" rows="5">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
