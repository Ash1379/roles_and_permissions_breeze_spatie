<x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
        <a href="{{ route('users.create') }}"class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

  <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b">
                    <th class="px-6 py-3 text-left"width="60">ID</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Roles</th>
                    <th class="px-6 py-3 text-left"width="150">Created At</th>
                    <th class="px-6 py-3 text-left"width="220">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50">
                @if($users->isNotEmpty())
                @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-6 py-4 text-left">{{ $user->id }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>

                    <td class="px-6 py-4 ">
                        {{ $user->email }}
                    </td>
                     <td class="px-6 py-4 ">
                        {{ $user->roles->pluck('name')->implode(', ') }}
                    </td>
                     <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user->created_at)->format('d M, y') }}</td>
                     <td class="px-6 py-4">
                        <a href="{{ route('users.edit',$user->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                        <a href="javascript:void(0);" onclick="deleteUser({{ $role->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                    </td>

                </tr>
                @endforeach
                @endif

            </tbody>
           </table>
           <div class="my-3">
           {{ $users->links() }}
           </div>
        </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deleteUser(id){
                if(confirm("Are you sure you want to delete this User?")){
                    $.ajax({
                        url:'{{ route("users.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'                      },
                        success: function(response){
                            window.location.href = '{{ route("users.index") }}';
                        }
                    });
                    }
                }
        </script>
    </x-slot>
</x-app-layout>
