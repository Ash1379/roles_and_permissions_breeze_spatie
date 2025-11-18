<x-app-layout>

    ----------------
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>

            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Position</th>
                        <th class="px-6 py-3 text-left">Salary</th>
                        <th class="px-6 py-3 text-left">Created At</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>

            </table>

            <div class="my-3">

            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function deleteEmployee(id){
                if(confirm('Are you sure you want to delete this employee?')){
                    $.ajax({
                        url: '{{ route("employees.destroy") }}',
                        type: 'DELETE',
                        data: {id:id},
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        success: function(response){
                            if(response.status) location.reload();
                        }
                    });
                }
            }
        </script>
    </x-slot>
    ----------------
</x-app-layout>
