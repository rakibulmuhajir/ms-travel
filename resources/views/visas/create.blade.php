@extends('layouts.app')

@section('title', 'Create Visa')

@section('content')
    <h1>Create Visa</h1>
    <form action="{{ route('visas.store') }}" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary">Create Visa</button>
    </form>
@endsection