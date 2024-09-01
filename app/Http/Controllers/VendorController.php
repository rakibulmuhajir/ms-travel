<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        if (request()->expectsJson()) {
            return response()->json($vendors);
        }
        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $vendor = Vendor::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json($vendor, 201);
        }
        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function show(Vendor $vendor)
    {
        if (request()->expectsJson()) {
            return response()->json($vendor);
        }
        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $vendor->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json($vendor);
        }
        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        if (request()->expectsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
