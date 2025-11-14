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
           <table class="w-full">
            <thead>
                <tr>
                    <th class="border px-6 py-4">ID</th>
                    <th class="border px-6 py-4">Name</th>
                    <th class="border px-6 py-4">Created At</th>
                    <th class="border px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
           </table>
        </div>
</x-app-layout>
