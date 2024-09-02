<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Vendor;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with("vendor")->get();
        return view("bills.index", compact("bills"));
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view("bills.create", compact("vendors"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "vendor_id" => "required|exists:vendors,id",
            "bill_number" => "required|unique:bills",
            "bill_date" => "required|date",
            "due_date" => "required|date|after_or_equal:bill_date",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:pending,paid",
        ]);

        $bill = Bill::create($validatedData);
        return redirect()
            ->route("bills.show", $bill)
            ->with("success", "Bill created successfully.");
    }

    public function show(Bill $bill)
    {
        return view("bills.show", compact("bill"));
    }

    public function edit(Bill $bill)
    {
        $vendors = Vendor::all();
        return view("bills.edit", compact("bill", "vendors"));
    }

    public function update(Request $request, Bill $bill)
    {
        $validatedData = $request->validate([
            "vendor_id" => "required|exists:vendors,id",
            "bill_number" => "required|unique:bills,bill_number," . $bill->id,
            "bill_date" => "required|date",
            "due_date" => "required|date|after_or_equal:bill_date",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:pending,paid",
        ]);

        $bill->update($validatedData);
        return redirect()
            ->route("bills.show", $bill)
            ->with("success", "Bill updated successfully.");
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()
            ->route("bills.index")
            ->with("success", "Bill deleted successfully.");
    }
}
