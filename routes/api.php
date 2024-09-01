<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientController::class);
Route::apiResource('vendors', VendorController::class);
Route::apiResource('tickets', TicketController::class);
Route::apiResource('visas', VisaController::class);
Route::apiResource('hotels', HotelController::class);
Route::apiResource('packages', PackageController::class);