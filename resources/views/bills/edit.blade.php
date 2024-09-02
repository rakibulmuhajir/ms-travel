@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bill</h1>
    <form action="{{ route('bills.update', $bill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="{{ $bill->amount }}" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $bill->due_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" {{ $bill->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $bill->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="overdue" {{ $bill->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
            </select>
        </div>
        <!-- Add more form fields as needed -->
        <button type="submit" class="btn btn-primary">Update Bill</button>
    </form>
</div>
@endsection