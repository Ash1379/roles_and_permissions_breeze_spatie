<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200">Create Product</h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('products.store') }}" class="bg-white p-6 rounded-lg shadow">
            @csrf

            <label class="block mb-2">Product Type</label>
            <select name="product_type" class="w-full border rounded mb-4">
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="gas">Gas</option>
            </select>

            <label class="block mb-2">Name</label>
            <input type="text" name="name" class="w-full border rounded mb-4" required>

            <label class="block mb-2">Description</label>
            <textarea name="description" class="w-full border rounded mb-4"></textarea>

            <button class="bg-slate-800 text-white px-5 py-3 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
