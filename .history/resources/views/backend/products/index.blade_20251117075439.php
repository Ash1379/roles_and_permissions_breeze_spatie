<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Products
            </h2>
            <a href="{{ route('products.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- پیام موفقیت --}}
            <div id="alert-container">
                <x-message></x-message>
            </div>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr class="border-b">
                            <th class="px-6 py-3 text-left w-16">ID</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Unit</th>
                            <th class="px-6 py-3 text-left">Price</th>
                            <th class="px-6 py-3 text-left w-60">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-50">
                        @forelse($products as $p)
                        <tr id="product-row-{{ $p->id }}" class="border-b hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ $p->id }}</td>
                            <td class="px-6 py-4">{{ $p->name }}</td>
                            <td class="px-6 py-4">{{ $p->unit }}</td>
                            <td class="px-6 py-4">{{ $p->price }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.edit',$p->id) }}" class="bg-blue-600 text-sm rounded-md text-white px-5 py-3 hover:bg-blue-700">Edit</a>
                                <button onclick="deleteProduct({{ $p->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Products Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="my-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteProduct(id){
                if(confirm("Are you sure you want to delete this product?")){
                    $.ajax({
                        url: '{{ route("products.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function(){
                            document.getElementById('product-row-' + id).remove();

                            let alertBox = document.createElement('div');
                            alertBox.className = 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4';
                            alertBox.innerText = 'Product deleted successfully!';
                            document.getElementById('alert-container').appendChild(alertBox);

                            setTimeout(() => { alertBox.remove() }, 3000);
                        },
                        error: function(){
                            alert('Error deleting product!');
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
