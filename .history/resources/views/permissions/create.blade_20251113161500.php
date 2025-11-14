<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                    <div>
                            <label for="" class="text-sm font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" type="text" name="name" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Role ">
                                @error('name')
                                <p class="text-red-500 font-medium" >{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
