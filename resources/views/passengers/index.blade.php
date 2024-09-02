@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Passengers</h1>
    <a href="{{ route('passengers.create') }}" class="btn btn-primary mb-3">Add New Passenger</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Passport Number</th>
                <th>Expiry Date</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($passengers as $passenger)
                <tr>
                    <td>{{ $passenger->name }}</td>
                    <td>{{ $passenger->phone }}</td>
                    <td>{{ $passenger->passport_number }}</td>
                    <td>{{ $passenger->expiry_date }}</td>
                    <td>{{ $passenger->client->name }}</td>
                    <td>
                        <a href="{{ route('passengers.show', $passenger) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('passengers.edit', $passenger) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('passengers.destroy', $passenger) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this passenger?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $passengers->links() }}
</div>
@endsection