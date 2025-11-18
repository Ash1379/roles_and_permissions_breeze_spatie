<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                All Transactions
            </h2>
            <a href="{{ route('transactions.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Type</th>
                        <th class="px-6 py-3 text-left">Reference ID</th>
                        <th class="px-6 py-3 text-left">Amount</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Notes</th>
                        <th class="px-6 py-3 text-left" width="220">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @foreach ($transactions as $transaction)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $transaction->id }}</td>
                            <td class="px-6 py-4">{{ ucfirst($transaction->type) }}</td>
                            <td class="px-6 py-4">{{ $transaction->reference_id }}</td>
                            <td class="px-6 py-4">{{ $transaction->amount }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M, Y') }}</td>
                            <td class="px-6 py-4">{{ $transaction->notes }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                                <a href="javascript:void(0);" onclick="deleteTransaction({{ $transaction->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteTransaction(id) {
                if (confirm('Are you sure you want to delete this transaction?')) {
                    $.ajax({
                        url: '{{ route("transactions.destroy") }}',
                        type: 'DELETE',
                        data: { id: id },
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        success: function() { window.location.reload(); }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
