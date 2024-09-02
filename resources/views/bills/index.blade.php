@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bills</h1>
    <a href="{{ route('bills.create') }}" class="btn btn-primary mb-3">Create New Bill</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->id }}</td>
                <td>{{ $bill->amount }}</td>
                <td>{{ $bill->due_date }}</td>
                <td>
                    <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('bills.destroy', $bill->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection