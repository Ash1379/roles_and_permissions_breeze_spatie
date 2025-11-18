<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Products
            </h2>
            <a href="{{ route('products.create') }}" class="bg-slate-700 text-white px-5 py-2 rounded">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <table class="w-full bg-white">
                <thead class="bg-gray-100">
                <tr class="border-b">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Unit</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($products as $p)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $p->id }}</td>
                    <td class="px-4 py-2">{{ $p->name }}</td>
                    <td class="px-4 py-2">{{ $p->unit }}</td>
                    <td class="px-4 py-2">{{ $p->price }}</td>

                    <td class="px-4 py-2">
                        <a href="{{ route('products.edit', $p->id) }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>

                        <a href="javascript:void(0);" onclick="deleteProduct({{ $p->id }})"
                           class="bg-red-600 text-white px-4 py-2 rounded">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteProduct(id){
                if(confirm('Delete this product?')){
                    $.ajax({
                        url: "{{ route('products.destroy') }}",
                        type: "DELETE",
                        data: { id: id },
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function(){
                            location.reload();
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
