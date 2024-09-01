@extends('layouts.app')

@section('title', 'Client Details')

@section('content')
    <h1>Client Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $client->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
