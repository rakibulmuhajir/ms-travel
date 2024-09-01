@extends('layouts.app')

@section('title', 'Create Vendor')

@section('content')
    <h1>Create Vendor</h1>
    <form action="{{ route('vendors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Vendor</button>
    </form>
@endsection