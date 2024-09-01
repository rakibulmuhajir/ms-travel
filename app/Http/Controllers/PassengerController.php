<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all();
        return view('passengers.index', compact('passengers'));
    }

    public function create()
    {
        return view('passengers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'passport_number' => 'required',
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
        return view('passengers.edit', compact('passenger'));
    }

    public function update(Request $request, Passenger $passenger)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'passport_number' => 'required',
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
