@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
@endsection
