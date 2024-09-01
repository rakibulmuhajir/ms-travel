<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Vendor;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('vendor')->get();
        if (request()->expectsJson()) {
            return response()->json($tickets);
        }
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('tickets.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pnr' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'outbound' => 'required|date',
            'inbound' => 'nullable|date',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        $ticket = Ticket::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json($ticket, 201);
        }
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        if (request()->expectsJson()) {
            return response()->json($ticket->load('vendor'));
        }
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $vendors = Vendor::all();
        return view('tickets.edit', compact('ticket', 'vendors'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'pnr' => 'string|max:255',
            'airline' => 'string|max:255',
            'outbound' => 'date',
            'inbound' => 'nullable|date',
            'cost' => 'numeric',
            'price' => 'numeric',
            'vendor_id' => 'exists:vendors,id',
        ]);

        $ticket->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($ticket);
        }
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
