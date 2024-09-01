@extends('layouts.app')

@section('title', 'Create Hotel')

@section('content')
    <h1>Create Hotel</h1>
    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>
        <div class="mb-3">
            <label for="nights" class="form-label">Nights</label>
            <input type="number" class="form-control" id="nights" name="nights" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select class="form-control" id="vendor_id" name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Hotel</button>
    </form>
@endsection