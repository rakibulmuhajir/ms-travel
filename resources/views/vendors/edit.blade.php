@extends('layouts.app')

@section('title', 'Edit Vendor')

@section('content')
    <h1>Edit Vendor</h1>
    <form action="{{ route('vendors.update', $vendor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $vendor->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vendor</button>
    </form>
@endsection