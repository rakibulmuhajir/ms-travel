<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        if (request()->expectsJson()) {
            return response()->json($clients);
        }
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
        ]);

        $client = Client::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json($client, 201);
        }
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        if (request()->expectsJson()) {
            return response()->json($client);
        }
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:clients,email,' . $client->id,
        ]);

        $client->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($client);
        }
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
