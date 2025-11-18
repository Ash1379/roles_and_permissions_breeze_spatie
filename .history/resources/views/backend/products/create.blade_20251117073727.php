<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Product') }}
            </h2>
            <a href="{{ route('products.index') }}" class="bg-gray-600 text-sm rounded-md text-white px-5 py-3">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white shadow p-6 rounded-md">

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                {{-- NAME --}}
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Name</label>
                    <input type="text" name="name"
                           class="w-full border-gray-300 rounded-md" required>
                </div>

                {{-- SUBMIT --}}
                <button class="bg-slate-700 text-white px-6 py-3 rounded-md hover:bg-slate-600">
                    Save
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
