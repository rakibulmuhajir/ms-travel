@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Bill</h1>
    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="overdue">Overdue</option>
            </select>
        </div>
        <!-- Add more form fields as needed -->
        <button type="submit" class="btn btn-primary">Create Bill</button>
    </form>
</div>
@endsection