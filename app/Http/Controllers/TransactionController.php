<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Client;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with("client")->get();
        return view("transactions.index", compact("transactions"));
    }

    public function create()
    {
        $clients = Client::all();
        return view("transactions.create", compact("clients"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "client_id" => "required|exists:clients,id",
            "amount" => "required|numeric",
            "type" => "required|in:income,expense",
            "description" => "required|string",
            "transaction_date" => "required|date",
        ]);

        $transaction = Transaction::create($validatedData);
        return redirect()
            ->route("transactions.show", $transaction)
            ->with("success", "Transaction created successfully.");
    }

    public function show(Transaction $transaction)
    {
        return view("transactions.show", compact("transaction"));
    }

    public function edit(Transaction $transaction)
    {
        $clients = Client::all();
        return view("transactions.edit", compact("transaction", "clients"));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            "client_id" => "required|exists:clients,id",
            "amount" => "required|numeric",
            "type" => "required|in:income,expense",
            "description" => "required|string",
            "transaction_date" => "required|date",
        ]);

        $transaction->update($validatedData);
        return redirect()
            ->route("transactions.show", $transaction)
            ->with("success", "Transaction updated successfully.");
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()
            ->route("transactions.index")
            ->with("success", "Transaction deleted successfully.");
    }
}
