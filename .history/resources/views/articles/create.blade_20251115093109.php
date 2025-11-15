<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Articles / Create
        </h2>
        <a href="{{ route('permissions.index') }}"class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                    <div>
                            <label for="" class="text-sm font-medium">Title</label>
                            <div class="my-3">
                                <input value="{{ old('title') }}" type="text" name="title" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" placeholder="Enter Title ">
                                @error('title')
                                <p class="text-red-500 font-medium" >{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-sm font-medium">Content</label>
                            <div class="my-3">
                                <textarea name="text" id="text"  class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" rows="10" cols="20">{{ old('text') }}</textarea>
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
