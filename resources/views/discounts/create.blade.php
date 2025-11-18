@extends('layouts.app')

@section('content')
<h1>{{ isset($discount->id) ? 'Edit Discount' : 'Create Discount' }}</h1>

@include('discounts.form')

@endsection
