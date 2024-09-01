<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with(['client', 'ticket', 'visa', 'hotel'])->get();
        return response()->json($packages);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'ticket_id' => 'nullable|exists:tickets,id',
            'visa_id' => 'nullable|exists:visas,id',
            'hotel_id' => 'nullable|exists:hotels,id',
        ]);

        $package = Package::create($validatedData);
        return response()->json($package, 201);
    }

    public function show(Package $package)
    {
        return response()->json($package->load(['client', 'ticket', 'visa', 'hotel']));
    }

    public function update(Request $request, Package $package)
    {
        $validatedData = $request->validate([
            'client_id' => 'exists:clients,id',
            'ticket_id' => 'nullable|exists:tickets,id',
            'visa_id' => 'nullable|exists:visas,id',
            'hotel_id' => 'nullable|exists:hotels,id',
        ]);

        $package->update($validatedData);
        return response()->json($package);
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return response()->json(null, 204);
    }
}
