@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
    <h1>Tickets</h1>
    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Add New Ticket</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>PNR</th>
                <th>Airline</th>
                <th>Outbound</th>
                <th>Inbound</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->pnr }}</td>
                    <td>{{ $ticket->airline }}</td>
                    <td>{{ $ticket->outbound }}</td>
                    <td>{{ $ticket->inbound }}</td>
                    <td>{{ $ticket->cost }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display: inline-block;">
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