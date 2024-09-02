@extends('layouts.app')

@section('title', 'Packages')

@section('content')
    <h1>Packages</h1>
    <a href="{{ route('packages.create') }}" class="btn btn-primary mb-3">Add New Package</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->price }}</td>
                    <td>{{ $package->cost }}</td>
                    <td>
                        <a href="{{ route('packages.show', $package) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('packages.edit', $package) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('packages.destroy', $package) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection