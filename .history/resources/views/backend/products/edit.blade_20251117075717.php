<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               Products / Edit
            </h2>
            <a href="{{ route('products.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.update',$product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <div>
                                <label class="text-sm font-medium">Name</label>
                                <input value="{{ old('name', $product->name) }}" type="text" name="name" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Product Name">
                                @error('name')
                                    <p class="text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="text-sm font-medium">Unit</label>
                                <input value="{{ old('unit', $product->unit) }}" type="text" name="unit" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Unit">
                                @error('unit')
                                    <p class="text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="text-sm font-medium">Price</label>
                                <input value="{{ old('price', $product->price) }}" type="number" name="price" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Price">
                                @error('price')
                                    <p class="text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="text-sm font-medium">Description</label>
                                <textarea name="description" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Description">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
