@php
    $tax = $tax ?? new \App\Models\Tax();
@endphp

<form action="{{ isset($tax->id) ? route('taxes.update', $tax->id) : route('taxes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $tax->title) }}">
    </div>

    <div class="mb-3">
        <label for="rate" class="form-label">Rate (%)</label>
        <input type="number" step="0.01" name="rate" id="rate" class="form-control" value="{{ old('rate', $tax->rate) }}">
    </div>

    <button type="submit" class="btn btn-primary">
        {{ isset($tax->id) ? 'Update Tax' : 'Create Tax' }}
    </button>
</form>
