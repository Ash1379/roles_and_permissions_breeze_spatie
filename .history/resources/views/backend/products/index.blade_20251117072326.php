<x-app-layout>

    {{-- ======================= Header ======================= --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Products') }}
            </h2>

            <a href="{{ route('products.create') }}"
               class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">
                Create
            </a>
        </div>
    </x-slot>

    {{-- ======================= Content ======================= --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            <x-message></x-message>

            {{-- ======================= Table ======================= --}}
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left" width="150">Created At</th>
                        <th class="px-6 py-3 text-left" width="220">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-gray-50">
                    @if($products->isNotEmpty())
                        @foreach ($products as $product)
                            <tr class="border-b hover:bg-gray-100">

                                <td class="px-6 py-4">{{ $product->id }}</td>

                                <td class="px-6 py-4">{{ $product->name }}</td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($product->created_at)->format('d M, y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">
                                        Edit
                                    </a>

                                    <a href="javascript:void(0);"
                                       onclick="deleteProduct({{ $product->id }})"
                                       class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">
                                        Delete
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="my-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>

    {{-- ======================= Script ======================= --}}
    <x-slot name="script">
        <script type="text/javascript">
            function deleteProduct(id){
                if(confirm("Are you sure you want to delete this product?")){
                    $.ajax({
                        url: '{{ route("products.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        dataType: 'json',

                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                        success: function(response){
                            window.location.href = '{{ route("products.index") }}';
                        }
                    });
                }
            }
        </script>
    </x-slot>

</x-app-layout>
