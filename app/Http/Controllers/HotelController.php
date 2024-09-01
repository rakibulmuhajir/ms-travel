<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('vendor')->get();
        return response()->json($hotels);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'nights' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        $hotel = Hotel::create($validatedData);
        return response()->json($hotel, 201);
    }

    public function show(Hotel $hotel)
    {
        return response()->json($hotel->load('vendor'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'check_in' => 'date',
            'check_out' => 'date|after:check_in',
            'nights' => 'integer|min:1',
            'price' => 'numeric',
            'cost' => 'numeric',
            'vendor_id' => 'exists:vendors,id',
        ]);

        $hotel->update($validatedData);
        return response()->json($hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return response()->json(null, 204);
    }
}
