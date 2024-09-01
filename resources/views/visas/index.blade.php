@extends('layouts.app')

@section('title', 'Visas')

@section('content')
    <h1>Visas</h1>
    <a href="{{ route('visas.create') }}" class="btn btn-primary mb-3">Add New Visa</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Vendor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visas as $visa)
                <tr>
                    <td>{{ $visa->id }}</td>
                    <td>{{ $visa->price }}</td>
                    <td>{{ $visa->cost }}</td>
                    <td>{{ $visa->vendor->name }}</td>
                    <td>
                        <a href="{{ route('visas.show', $visa) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('visas.edit', $visa) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('visas.destroy', $visa) }}" method="POST" style="display: inline-block;">
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