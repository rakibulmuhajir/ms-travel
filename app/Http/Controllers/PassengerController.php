<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Client;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::with('client')->paginate(10);
        return view('passengers.index', compact('passengers'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('passengers.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'passport_number' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
        ]);

        Passenger::create($validatedData);

        return redirect()->route('passengers.index')->with('success', 'Passenger created successfully.');
    }

    public function show(Passenger $passenger)
    {
        return view('passengers.show', compact('passenger'));
    }

    public function edit(Passenger $passenger)
    {
        $clients = Client::all();
        return view('passengers.edit', compact('passenger', 'clients'));
    }

    public function update(Request $request, Passenger $passenger)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'passport_number' => 'required|string|max:255',
            'expiry_date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
        ]);

        $passenger->update($validatedData);

        return redirect()->route('passengers.index')->with('success', 'Passenger updated successfully.');
    }

    public function destroy(Passenger $passenger)
    {
        $passenger->delete();

        return redirect()->route('passengers.index')->with('success', 'Passenger deleted successfully.');
    }
}
