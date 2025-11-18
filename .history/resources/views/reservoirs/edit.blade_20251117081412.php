<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Employees / Edit
            </h2>
            <a href="{{ route('employees.index') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('employees.update',$employee->id) }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label class="text-sm font-medium">User</label>
                            <select name="user_id" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $employee->user_id)==$user->id ? 'selected':'' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Position</label>
                            <input type="text" name="position" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('position', $employee->position) }}">
                            @error('position')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="text-sm font-medium">Salary</label>
                            <input type="number" step="0.01" name="salary" class="border-gray-300 text-black shadow-sm w-1/2 rounded-lg" value="{{ old('salary', $employee->salary) }}">
                            @error('salary')<p class="text-red-500 font-medium">{{ $message }}</p>@enderror
                        </div>

                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
