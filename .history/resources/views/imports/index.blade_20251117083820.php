<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Customers
            </h2>
            <a href="{{ route('customers.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Phone</th>
                        <th class="px-6 py-3 text-left">Address</th>
                        <th class="px-6 py-3 text-left">Created At</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @foreach($customers as $customer)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $customer->id }}</td>
                        <td class="px-6 py-4">{{ $customer->name }}</td>
                        <td class="px-6 py-4">{{ $customer->phone ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $customer->address ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $customer->created_at->format('d M, Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                            <a href="javascript:void(0);" onclick="deleteCustomer({{ $customer->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="my-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteCustomer(id){
                if(confirm('Are you sure you want to delete this customer?')){
                    $.ajax({
                        url: '{{ route("customers.destroy") }}',
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
</x-app-layout>
