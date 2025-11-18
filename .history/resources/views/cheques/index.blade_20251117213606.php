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


            {{-- ___________ End main _________ --}}
            </div> <!-- container-fluid -->
        </div> <!-- content -->

    </div>
@endsection

