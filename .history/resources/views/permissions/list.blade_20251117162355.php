@include('my_layouts.master')
@section('content')
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
            <thead class="bg-gray-50">
                <tr class="border-b">
                    <th class="px-6 py-3 text-left"width="60">ID</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left"width="150">Created At</th>
                    <th class="px-6 py-3 text-left"width="220">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-50">
                @if($permissions->isNotEmpty())
                @foreach ($permissions as $permission)
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $permission->id }}</td>
                    <td class="px-6 py-4">{{ $permission->name }}</td>
                    {{-- <td class="px-6 py-4">{{ $permission->created_at->format('d M Y') }}</td> --}}
                     <td class="px-6 py-4">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, y') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('permissions.edit',$permission->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                        <a href="javascript:void(0);" onclick="deletePermission({{ $permission->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                    </td>
                </tr>
                @endforeach
                @endif

            </tbody>
           </table>
           <div class="my-3">
           {{ $permissions->links() }}
           </div>
        </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deletePermission(id){
                if(confirm("Are you sure you want to delete this permission?")){
                    $.ajax({
                        url: '{{ route("permissions.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'                      },
                        success: function(response){
                            window.location.href = '{{ route("permissions.index") }}';
                        }
                    });
                    }
                }
        </script>
    </x-slot>
@endsection
