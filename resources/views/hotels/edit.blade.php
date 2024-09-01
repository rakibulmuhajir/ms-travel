@extends('layouts.app')

@section('title', 'Edit Hotel')

@section('content')
    <h1>Edit Hotel</h1>
    <form action="{{ route('hotels.update', $hotel) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Check-in</label>
            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ $hotel->check_in->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check-out</label>
            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ $hotel->check_out->format('Y-m-d') }}" required>
        </div>
        <div class="mb-3">
            <label for="nights" class="form-label">Nights</label>
            <input type="number" class="form-control" id="nights" name="nights" value="{{ $hotel->nights }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $hotel->price }}" required>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{ $hotel->cost }}" required>
        </div>
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select class="form-control" id="vendor_id" name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $hotel->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Hotel</button>
    </form>
@endsection