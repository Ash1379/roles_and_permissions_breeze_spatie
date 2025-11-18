<x-app-layout>
<x-slot name="header">
<div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
       Taxes / Edit
    </h2>
    <a href="{{ route('taxes.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
</div>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('taxes.update', $tax->id) }}" method="post">
                @csrf
                <label class="text-sm font-medium">Title</label>
                <div class="my-3">
                    <input type="text" name="title" value="{{ old('title', $tax->title) }}" class="border-gray-300 w-1/2 rounded-lg">
                    @error('title') <p class="text-red-500">{{ $message }}</p> @enderror
                </div>

                <label class="text-sm font-medium">Rate (%)</label>
                <div class="my-3">
                    <input type="number" step="0.01" name="rate" value="{{ old('rate', $tax->rate) }}" class="border-gray-300 w-1/2 rounded-lg">
                    @error('rate') <p class="text-red-500">{{ $message }}</p> @enderror
                </div>

                <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
</x-app-layout>
