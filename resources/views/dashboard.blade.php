@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <p class="card-text">Manage your clients</p>
                    <a href="{{ route('clients.index') }}" class="btn btn-primary">View Clients</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendors</h5>
                    <p class="card-text">Manage your vendors</p>
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary">View Vendors</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Packages</h5>
                    <p class="card-text">Manage your travel packages</p>
                    <a href="{{ route('packages.index') }}" class="btn btn-primary">View Packages</a>
                </div>
            </div>
        </div>
    </div>
@endsection