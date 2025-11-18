@php
    $transaction = $transaction ?? new \App\Models\Transaction();
@endphp

<form action="{{ isset($transaction->id) ? route('transactions.update', $transaction->id) : route('transactions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-control">
            @foreach(['import','sale','payment','lend','cheque','expense'] as $type)
                <option value="{{ $type }}" {{ old('type', $transaction->type) == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="reference_id" class="form-label">Reference ID</label>
        <input type="number" name="reference_id" id="reference_id" class="form-control" value="{{ old('reference_id', $transaction->reference_id) }}">
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}">
    </div>

    <div class="mb-3">
        <label for="transaction_date" class="form-label">Transaction Date</label>
        <input type="datetime-local" name="transaction_date" id="transaction_date" class="form-control"
               value="{{ old('transaction_date', isset($transaction->transaction_date) ? $transaction->transaction_date->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea name="notes" id="notes" class="form-control">{{ old('notes', $transaction->notes) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($transaction->id) ? 'Update Transaction' : 'Create Transaction' }}
    </button>
</form>
