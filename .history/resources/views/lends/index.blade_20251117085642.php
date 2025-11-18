<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Sales') }}
            </h2>
            <a href="{{ route('sales.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left" width="60">ID</th>
                        <th class="px-6 py-3 text-left">Customer</th>
                        <th class="px-6 py-3 text-left">Product</th>
                        <th class="px-6 py-3 text-left">Litres</th>
                        <th class="px-6 py-3 text-left">Rate</th>
                        <th class="px-6 py-3 text-left">Total</th>
                        <th class="px-6 py-3 text-left" width="150">Sold At</th>
                        <th class="px-6 py-3 text-left" width="220">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @if($sales->isNotEmpty())
                        @foreach ($sales as $sale)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $sale->id }}</td>
                            <td class="px-6 py-4">{{ $sale->customer->name }}</td>
                            <td class="px-6 py-4">{{ $sale->product->name }}</td>
                            <td class="px-6 py-4">{{ $sale->litres }}</td>
                            <td class="px-6 py-4">{{ $sale->rate }}</td>
                            <td class="px-6 py-4">{{ $sale->total }}</td>
                            <td class="px-6 py-4">{{ $sale->sold_at?->format('d M, y H:i') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('sales.edit', $sale->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                                <a href="javascript:void(0);" onclick="deleteSale({{ $sale->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="my-3">
                {{ $sales->links() }}
            </div>
        </div>

        <x-slot name="script">
            <script type="text/javascript">
                function deleteSale(id){
                    if(confirm("Are you sure you want to delete this sale?")){
                        $.ajax({
                            url: '{{ route("sales.destroy") }}',
                            type: 'DELETE',
                            data: {id:id},
                            dataType: 'json',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            success: function(response){
                                window.location.href = '{{ route("sales.index") }}';
                            }
                        });
                    }
                }
            </script>
        </x-slot>
    </div>
</x-app-layout>
