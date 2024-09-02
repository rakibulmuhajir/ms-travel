@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Passenger Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $passenger->name }}</h5>
            <p class="card-text"><strong>Phone:</strong> {{ $passenger->phone }}</p>
            <p class="card-text"><strong>Passport Number:</strong> {{ $passenger->passport_number }}</p>
            <p class="card-text"><strong>Expiry Date:</strong> {{ $passenger->expiry_date }}</p>
            <p class="card-text"><strong>Client:</strong> {{ $passenger->client->name }}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('passengers.edit', $passenger) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('passengers.index') }}" class="btn btn-secondary">Back to List</a>
        <form action="{{ route('passengers.destroy', $passenger) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this passenger?')">Delete</button>
        </form>
    </div>
</div>
@endsection