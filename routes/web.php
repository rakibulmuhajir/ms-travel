<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('clients', ClientController::class);
Route::resource('vendors', VendorController::class);
Route::resource('tickets', TicketController::class);
Route::resource('visas', VisaController::class);
Route::resource('hotels', HotelController::class);
Route::resource('packages', PackageController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('bills', BillController::class);
Route::resource('transactions', TransactionController::class);
