@extends('layouts.app')

@section('title', 'Hotels')

@section('content')
    <h1>Hotels</h1>
    <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">Add New Hotel</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Nights</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Vendor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->check_in }}</td>
                    <td>{{ $hotel->check_out }}</td>
                    <td>{{ $hotel->nights }}</td>
                    <td>{{ $hotel->price }}</td>
                    <td>{{ $hotel->cost }}</td>
                    <td>{{ $hotel->vendor->name }}</td>
                    <td>
                        <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" style="display: inline-block;">
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