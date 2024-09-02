@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Passenger</h1>
    <form action="{{ route('passengers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="passport_number">Passport Number</label>
            <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" required>
            @error('passport_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" required>
            @error('expiry_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                <option value="">Select a client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Passenger</button>
        <a href="{{ route('passengers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection