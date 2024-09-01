@extends('layouts.app')

@section('title', 'Vendor Details')

@section('content')
    <h1>Vendor Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vendor->name }}</h5>
            <p class="card-text">ID: {{ $vendor->id }}</p>
            <a href="{{ route('vendors.edit', $vendor) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection