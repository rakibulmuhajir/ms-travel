@extends('layouts.app')

@section('title', 'Vendors')

@section('content')
    <h1>Vendors</h1>
    <a href="{{ route('vendors.create') }}" class="btn btn-primary mb-3">Add New Vendor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->id }}</td>
                    <td>{{ $vendor->name }}</td>
                    <td>
                        <a href="{{ route('vendors.show', $vendor) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('vendors.edit', $vendor) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" style="display: inline-block;">
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