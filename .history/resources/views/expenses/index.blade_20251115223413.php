<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Expenses') }}
            </h2>
            <a href="{{ route('expenses.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="table-auto w-full border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Notes</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $expense->title }}</td>
                            <td class="border px-4 py-2">{{ $expense->price }}</td>
                            <td class="border px-4 py-2">{{ $expense->spent_at ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $expense->notes ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                {{-- <a href="{{ route('expenses.delete', $expense->id) }}" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-3 py-1 rounded">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
