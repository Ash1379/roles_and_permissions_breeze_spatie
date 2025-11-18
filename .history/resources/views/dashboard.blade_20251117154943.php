<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-1">
        @include('backend.layouts.master')
        {{-- E:\Laravel_12\roles_and_permissions_breeze_spatie\resources\views\backend\layouts\master.blade.php --}}
       </div>

</x-app-layout>
