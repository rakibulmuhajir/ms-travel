<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MS Travel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">MS Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vendors.index') }}">Vendors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tickets.index') }}">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visas.index') }}">Visas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hotels.index') }}">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('packages.index') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoices.index') }}">Invoices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bills.index') }}">Bills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('passengers.index') }}">Passengers</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
