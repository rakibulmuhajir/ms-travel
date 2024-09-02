@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add New Transaction</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->client->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display: inline-block;">
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
