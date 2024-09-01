@extends('layouts.app')

@section('title', 'Visa Details')

@section('content')
    <h1>Visa Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Visa ID: {{ $visa->id }}</h5>
            <p class="card-text">Price: {{ $visa->price }}</p>
            <p class="card-text">Cost: {{ $visa->cost }}</p>
            <p class="card-text">Vendor: {{ $visa->vendor->name }}</p>
            <a href="{{ route('visas.edit', $visa) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('visas.destroy', $visa) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection