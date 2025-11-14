<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Permissions / Create
        </h2>
        <a href="{{ route('permissions.index') }}"class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Bac</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{ __("You're viewing the permissions list page.") }}
        </div>
    </div>
</x-app-layout>
