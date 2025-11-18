<x-app-layout>
<x-slot name="header">
<div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        All Discounts
    </h2>
    <a href="{{ route('discounts.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
</div>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-message></x-message>
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr class="border-b">
                <th class="px-6 py-3 text-left">ID</th>
                <th class="px-6 py-3 text-left">Customer</th>
                <th class="px-6 py-3 text-left">Sale</th>
                <th class="px-6 py-3 text-left">Amount</th>
                <th class="px-6 py-3 text-left">Reason</th>
                <th class="px-6 py-3 text-left">Created At</th>
                <th class="px-6 py-3 text-left" width="200">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-50">
            @foreach($discounts as $discount)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-6 py-4">{{ $discount->id }}</td>
                <td class="px-6 py-4">{{ $discount->customer?->name ?? '-' }}</td>
                <td class="px-6 py-4">{{ $discount->sale?->id ?? '-' }}</td>
                <td class="px-6 py-4">{{ $discount->amount }}</td>
                <td class="px-6 py-4">{{ $discount->reason }}</td>
                <td class="px-6 py-4">{{ $discount->created_at->format('d M, Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('discounts.edit', $discount->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Edit</a>
                    <a href="javascript:void(0);" onclick="deleteDiscount({{ $discount->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">{{ $discounts->links() }}</div>
</div>

<x-slot name="script">
<script>
function deleteDiscount(id){
    if(confirm("Are you sure you want to delete this discount?")){
        $.ajax({
            url: '{{ route("discounts.destroy") }}',
            type: 'DELETE',
            data: {id:id},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function(response){
                window.location.reload();
            }
        });
    }
}
</script>
</x-slot>
</x-app-layout>
