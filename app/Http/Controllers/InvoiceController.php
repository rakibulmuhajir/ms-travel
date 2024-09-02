<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with("client")->get();
        return view("invoices.index", compact("invoices"));
    }

    public function create()
    {
        $clients = Client::all();
        return view("invoices.create", compact("clients"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "client_id" => "required|exists:clients,id",
            "invoice_number" => "required|unique:invoices",
            "invoice_date" => "required|date",
            "due_date" => "required|date|after_or_equal:invoice_date",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:draft,sent,paid",
        ]);

        $invoice = Invoice::create($validatedData);
        return redirect()
            ->route("invoices.show", $invoice)
            ->with("success", "Invoice created successfully.");
    }

    public function show(Invoice $invoice)
    {
        return view("invoices.show", compact("invoice"));
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        return view("invoices.edit", compact("invoice", "clients"));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validatedData = $request->validate([
            "client_id" => "required|exists:clients,id",
            "invoice_number" =>
                "required|unique:invoices,invoice_number," . $invoice->id,
            "invoice_date" => "required|date",
            "due_date" => "required|date|after_or_equal:invoice_date",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:draft,sent,paid",
        ]);

        $invoice->update($validatedData);
        return redirect()
            ->route("invoices.show", $invoice)
            ->with("success", "Invoice updated successfully.");
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()
            ->route("invoices.index")
            ->with("success", "Invoice deleted successfully.");
    }
}
