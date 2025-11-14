<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' All Permissions') }}
        </h2>
        <a href="{{ route('permissions.create') }}"class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="border px-4 py-2">{{ $permission->id }}</td>
                                    <td class="border px-4 py-2">{{ $permission->name }}</td>
                                    
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div>
</x-app-layout>
