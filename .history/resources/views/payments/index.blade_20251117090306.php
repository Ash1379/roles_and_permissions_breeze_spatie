<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Payments') }}
            </h2>
            <a href="{{ route('payments.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
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
                        <th class="px-6 py-3 text-left">Amount</th>
                        <th class="px-6 py-3 text-left">Method</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left" width="220">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    @if($payments->isNotEmpty())
                        @foreach ($payments as $payment)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $payment->id }}</td>
                            <td class="px-6 py-4">{{ $payment->customer->name }}</td>
                            <td class="px-6 py-4">{{ $payment->amount }}</td>
                            <td class="px-6 py-4">{{ $payment->method }}</td>
                            <td class="px-6 py-4">{{ $payment->date->format('d M, Y') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('payments.edit', $payment->id) }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-600">Edit</a>
                                <a href="javascript:void(0);" onclick="deletePayment({{ $payment->id }})" class="bg-red-500 text-sm rounded-md text-white px-5 py-3 hover:bg-red-400">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div class="my-3">
                {{ $payments->links() }}
            </div>
        </div>

        <x-slot name="script">
            <script type="text/javascript">
                function deletePayment(id){
                    if(confirm("Are you sure you want to delete this payment?")){
                        $.ajax({
                            url: '{{ route("payments.destroy") }}',
                            type: 'DELETE',
                            data: {id:id},
                            dataType: 'json',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            success: function(response){
                                window.location.href = '{{ route("payments.index") }}';
                            }
                        });
                    }
                }
            </script>
        </x-slot>
    </div>
</x-app-layout>
