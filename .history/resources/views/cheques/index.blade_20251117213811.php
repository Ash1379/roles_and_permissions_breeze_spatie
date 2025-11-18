@extends('my_layouts.master')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-xxl">
                <div class="flex justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        All Cheques
                    </h2>
                    <a href="{{ route('cheques.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
                </div>
                {{-- ___________ Start main _________ --}}
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

            {{-- ___________ End main _________ --}}
            </div> <!-- container-fluid -->
        </div> <!-- content -->

    </div>
@endsection
--
@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Cheques</h2>
            <a href="{{ route('cheques.create') }}" class="btn btn-primary btn-sm">
                Create
            </a>
        </div>
        <!-- End Header -->

        <!-- Start Main Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    {{-- پیام‌ها --}}
                    <x-message />

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Cheque Number</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th width="220">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cheques as $cheque)
                                        <tr>
                                            <td>{{ $cheque->id }}</td>
                                            <td>{{ $cheque->customer->name }}</td>
                                            <td>{{ $cheque->cheque_number }}</td>
                                            <td>{{ $cheque->amount }}</td>
                                            <td>{{ $cheque->due_date->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('cheques.edit', $cheque->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <button onclick="deleteCheque({{ $cheque->id }})"
                                                        class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $cheques->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Main Content -->

    </div>
</div>
@endsection

@section('scripts')
<script>
    function deleteCheque(id) {
        if (confirm('Are you sure you want to delete this cheque?')) {
            $.ajax({
                url: '{{ route("cheques.destroy") }}',
                type: 'DELETE',
                data: { id: id },
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function() {
                    window.location.reload();
                }
            });
        }
    }
</script>
@endsection
