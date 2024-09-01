@extends('layouts.app')

@section('title', 'Create Ticket')

@section('content')
    <h1>Create Ticket</h1>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pnr" class="form-label">PNR</label>
            <input type="text" class="form-control" id="pnr" name="pnr" required>
        </div>
        <div class="mb-3">
            <label for="airline" class="form-label">Airline</label>
            <input type="text" class="form-control" id="airline" name="airline" required>
        </div>
        <div class="mb-3">
            <label for="outbound" class="form-label">Outbound</label>
            <input type="datetime-local" class="form-control" id="outbound" name="outbound" required>
        </div>
        <div class="mb-3">
            <label for="inbound" class="form-label">Inbound</label>
            <input type="datetime-local" class="form-control" id="inbound" name="inbound">
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select class="form-control" id="vendor_id" name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Ticket</button>
    </form>
@endsection