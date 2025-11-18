<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Companies / Create
            </h2>
            <a href="{{ route('companies.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('companies.store') }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label class="text-sm font-medium">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                            @error('name')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Address</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
