<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200">Edit Product</h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('products.update', $product->id) }}" class="bg-white p-6 rounded-lg shadow">
            @csrf

            <label class="block mb-2">Product Type</label>
            <select name="product_type" class="w-full border rounded mb-4">
                <option value="petrol" {{ $product->product_type == 'petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="diesel" {{ $product->product_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="gas" {{ $product->product_type == 'gas' ? 'selected' : '' }}>Gas</option>
            </select>

            <label class="block mb-2">Name</label>
            <input type="text" name="name" class="w-full border rounded mb-4"
                   value="{{ $product->name }}" required>

            <label class="block mb-2">Description</label>
            <textarea name="description" class="w-full border rounded mb-4">{{ $product->description }}</textarea>

            <button class="bg-slate-800 text-white px-5 py-3 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
