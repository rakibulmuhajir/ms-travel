@extends('layouts.app')

@section('title', 'Package Details')

@section('content')
    <h1>Package Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $package->name }}</h5>
            <p class="card-text">ID: {{ $package->id }}</p>
            <p class="card-text">Price: {{ $package->price }}</p>
            <p class="card-text">Cost: {{ $package->cost }}</p>
            <a href="{{ route('packages.edit', $package) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('packages.destroy', $package) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
