<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Discount
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('discounts.store') }}" method="POST">
                    @csrf
                    @include('discounts.form') <!-- Include the shared form -->
                    <div class="mt-4">
                        <button type="submit" class="bg-slate-700 text-white px-6 py-3 rounded-md">Create</button>
                        <a href="{{ route('discounts.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-md">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
