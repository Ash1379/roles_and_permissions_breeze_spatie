@extends('my_layouts.master')
@section('content')
    {{-- <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                All Cheques
            </h2>
            <a href="{{ route('cheques.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Customer</th>
                        <th class="px-6 py-3 text-left">Cheque Number</th>
                        <th class="px-6 py-3 text-left">Amount</th>
                        <th class="px-6 py-3 text-left">Due Date</th>
                        <th class="px-6 py-3 text-left" width="220">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @foreach ($cheques as $cheque)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $cheque->id }}</td>
                            <td class="px-6 py-4">{{ $cheque->customer->name }}</td>
                            <td class="px-6 py-4">{{ $cheque->cheque_number }}</td>
                            <td class="px-6 py-4">{{ $cheque->amount }}</td>
                            <td class="px-6 py-4">{{ $cheque->due_date->format('d M, Y') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('cheques.edit', $cheque->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                                <a href="javascript:void(0);" onclick="deleteCheque({{ $cheque->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3">
                {{ $cheques->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteCheque(id) {
                if (confirm('Are you sure you want to delete this cheque?')) {
                    $.ajax({
                        url: '{{ route("cheques.destroy") }}',
                        type: 'DELETE',
                        data: { id: id },
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function() { window.location.reload(); }
                    });
                }
            }
        </script>
    </x-slot>
@endsection()
