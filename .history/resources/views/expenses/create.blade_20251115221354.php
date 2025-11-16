<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Expense</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <form action="{{ route('expenses.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Title</label>
                    <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Price</label>
                    <input type="number" name="price" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Date</label>
                    <input type="date" name="spent_at" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Notes</label>
                    <textarea name="notes" class="w-full border px-3 py-2 rounded"></textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
