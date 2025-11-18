<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Reservoirs / Edit
            </h2>
            <a href="{{ route('reservoirs.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('reservoirs.update',$reservoir->id) }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label class="text-sm font-medium">Name</label>
                            <input type="text" name="name" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('name', $reservoir->name) }}">
                            @error('name')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Location</label>
                            <input type="text" name="location" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('location', $reservoir->location) }}">
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Capacity</label>
                            <input type="number" name="capacity" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('capacity', $reservoir->capacity) }}">
                            @error('capacity')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
