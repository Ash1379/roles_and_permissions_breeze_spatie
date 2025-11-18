@php
    $expense = $expense ?? new \App\Models\Expense();
@endphp

<form action="{{ isset($expense->id) ? route('expenses.update', $expense->id) : route('expenses.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $expense->title) }}">
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $expense->amount) }}">
    </div>

    <div class="mb-3">
        <label for="expense_date" class="form-label">Expense Date</label>
        <input type="date" name="expense_date" id="expense_date" class="form-control" value="{{ old('expense_date', $expense->expense_date) }}">
    </div>

    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea name="notes" id="notes" class="form-control">{{ old('notes', $expense->notes) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($expense->id) ? 'Update Expense' : 'Create Expense' }}
    </button>
</form>
