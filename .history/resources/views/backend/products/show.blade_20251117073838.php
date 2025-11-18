<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product Details') }}
            </h2>
            <a href="{{ route('products.index') }}"
               class="bg-gray-600 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow p-6 rounded-md">

                <div class="mb-4">
                    <strong class="text-gray-800">ID:</strong>
                    <span>{{ $product->id }}</span>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-800">Name:</strong>
                    <span>{{ $product->name }}</span>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-800">Created At:</strong>
                    <span>{{ $product->created_at->format('d M, Y') }}</span>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
