@extends('layouts.app')

@section('title', 'Edit Ticket')

@section('content')
    <h1>Edit Ticket</h1>
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pnr" class="form-label">PNR</label>
            <input type="text" class="form-control" id="pnr" name="pnr" value="{{ $ticket->pnr }}" required>
        </div>
        <div class="mb-3">
            <label for="airline" class="form-label">Airline</label>
            <select class="form-control" id="airline" name="airline" required>
                <option value="PIA" {{ $ticket->airline == 'PIA' ? 'selected' : '' }}>PIA (PK)</option>
                <option value="Airblue" {{ $ticket->airline == 'Airblue' ? 'selected' : '' }}>Airblue (PA)</option>
                <option value="Saudia" {{ $ticket->airline == 'Saudia' ? 'selected' : '' }}>Saudia (SV)</option>
                <option value="Etihad" {{ $ticket->airline == 'Etihad' ? 'selected' : '' }}>Etihad (EY)</option>
                <option value="Air Arabia" {{ $ticket->airline == 'Air Arabia' ? 'selected' : '' }}>Air Arabia (G9)</option>
                <option value="Fly Dubai" {{ $ticket->airline == 'Fly Dubai' ? 'selected' : '' }}>Fly Dubai (FZ)</option>
                <option value="Serene Air" {{ $ticket->airline == 'Serene Air' ? 'selected' : '' }}>Serene Air (ER)</option>
                <option value="Air Sial" {{ $ticket->airline == 'Air Sial' ? 'selected' : '' }}>Air Sial (PF)</option>
                <option value="Fly Jinnah" {{ $ticket->airline == 'Fly Jinnah' ? 'selected' : '' }}>Fly Jinnah (9P)</option>
                <option value="Emirates" {{ $ticket->airline == 'Emirates' ? 'selected' : '' }}>Emirates (EK)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="number_of_people" class="form-label">Number of People</label>
            <input type="number" class="form-control" id="number_of_people" name="number_of_people" value="{{ $ticket->number_of_people }}" required min="1">
        </div>
        <div class="mb-3">
            <label for="outbound" class="form-label">Outbound</label>
            <input type="datetime-local" class="form-control" id="outbound" name="outbound" value="{{ $ticket->outbound->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="inbound" class="form-label">Inbound</label>
            <input type="datetime-local" class="form-control" id="inbound" name="inbound" value="{{ $ticket->inbound ? $ticket->inbound->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" value="{{ $ticket->cost }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $ticket->price }}" required>
        </div>
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select class="form-control" id="vendor_id" name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" {{ $ticket->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
@endsection