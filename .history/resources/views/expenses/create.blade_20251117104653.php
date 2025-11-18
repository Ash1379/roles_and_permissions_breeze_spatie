@extends('layouts.app')

@section('content')
<h1>{{ isset($expense->id) ? 'Edit Expense' : 'Create Expense' }}</h1>

@include('expenses.form')

@endsection
