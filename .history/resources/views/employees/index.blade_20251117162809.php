
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Employees
            </h2>
            <a href="{{ route('employees.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Position</th>
                        <th class="px-6 py-3 text-left">Salary</th>
                        <th class="px-6 py-3 text-left">Created At</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @foreach($employees as $emp)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $emp->id }}</td>
                        <td class="px-6 py-4">{{ $emp->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $emp->position }}</td>
                        <td class="px-6 py-4">{{ number_format($emp->salary,2) }}</td>
                        <td class="px-6 py-4">{{ $emp->created_at->format('d M, Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('employees.edit',$emp->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                            <a href="javascript:void(0);" onclick="deleteEmployee({{ $emp->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteEmployee(id){
                if(confirm('Are you sure you want to delete this employee?')){
                    $.ajax({
                        url: '{{ route("employees.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        success: function(response){
                            if(response.status) location.reload();
                        }
                    });
                }
            }
        </script>
    </x-slot>


