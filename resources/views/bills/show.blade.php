@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bill Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Bill #{{ $bill->id }}</h5>
            <p class="card-text"><strong>Amount:</strong> {{ $bill->amount }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $bill->due_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $bill->status }}</p>
            <!-- Add more bill details as needed -->
        </div>
    </div>
    <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('bills.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection