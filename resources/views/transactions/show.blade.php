<?php
@extends('layouts.app')

@section('title', 'Transaction Details')

@section('content')
    <h1>Transaction Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction #{{ $transaction->id }}</h5>
            <p class="card-text"><strong>Client:</strong> {{ $transaction->client->name }}</p>
            <p class="card-text"><strong>Amount:</strong> {{ $transaction->amount }}</p>
            <p class="card-text"><strong>Type:</strong> {{ ucfirst($transaction->type) }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $transaction->description }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $transaction->transaction_date }}</p>
            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
