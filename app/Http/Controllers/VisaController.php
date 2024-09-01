<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $visas = Visa::with('vendor')->get();
        if (request()->expectsJson()) {
            return response()->json($visas);
        }
        return view('visas.index', compact('visas'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('visas.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        $visa = Visa::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json($visa, 201);
        }
        return redirect()->route('visas.index')->with('success', 'Visa created successfully.');
    }

    public function show(Visa $visa)
    {
        if (request()->expectsJson()) {
            return response()->json($visa->load('vendor'));
        }
        return view('visas.show', compact('visa'));
    }

    public function edit(Visa $visa)
    {
        $vendors = Vendor::all();
        return view('visas.edit', compact('visa', 'vendors'));
    }

    public function update(Request $request, Visa $visa)
    {
        $validatedData = $request->validate([
            'price' => 'numeric',
            'cost' => 'numeric',
            'vendor_id' => 'exists:vendors,id',
        ]);

        $visa->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($visa);
        }
        return redirect()->route('visas.index')->with('success', 'Visa updated successfully.');
    }

    public function destroy(Visa $visa)
    {
        $visa->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('visas.index')->with('success', 'Visa deleted successfully.');
    }
}
