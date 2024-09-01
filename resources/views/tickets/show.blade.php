@extends('layouts.app')

@section('title', 'Ticket Details')

@section('content')
    <h1>Ticket Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">PNR: {{ $ticket->pnr }}</h5>
            <p class="card-text">Airline: {{ $ticket->airline }}</p>
            <p class="card-text">Outbound: {{ $ticket->outbound }}</p>
            <p class="card-text">Inbound: {{ $ticket->inbound ?? 'N/A' }}</p>
            <p class="card-text">Cost: {{ $ticket->cost }}</p>
            <p class="card-text">Price: {{ $ticket->price }}</p>
            <p class="card-text">Vendor: {{ $ticket->vendor->name }}</p>
            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection