<x-app-layout>
<x-slot name="header">
<div class="flex justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('All Taxes') }}
    </h2>
    <a href="{{ route('taxes.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
</div>
</x-slot>

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-message></x-message>
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr class="border-b">
                <th class="px-6 py-3 text-left" width="60">ID</th>
                <th class="px-6 py-3 text-left">Title</th>
                <th class="px-6 py-3 text-left">Rate (%)</th>
                <th class="px-6 py-3 text-left" width="150">Created At</th>
                <th class="px-6 py-3 text-left" width="220">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-gray-50">
            @foreach($taxes as $tax)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-6 py-4">{{ $tax->id }}</td>
                <td class="px-6 py-4">{{ $tax->title }}</td>
                <td class="px-6 py-4">{{ $tax->rate }}</td>
                <td class="px-6 py-4">{{ $tax->created_at->format('d M, Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('taxes.edit', $tax->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                    <a href="javascript:void(0);" onclick="deleteTax({{ $tax->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-3">{{ $taxes->links() }}</div>
</div>

<x-slot name="script">
<script>
function deleteTax(id){
    if(confirm("Are you sure you want to delete this tax?")){
        $.ajax({
            url: '{{ route("taxes.destroy") }}',
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
