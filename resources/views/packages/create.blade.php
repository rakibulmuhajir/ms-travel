@extends('layouts.app')

@section('title', 'Edit Package')

@section('content')
    <h1>Edit Package</h1>
    <form action="{{ route('packages.update', $package) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{ $package->cost }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>
@endsection