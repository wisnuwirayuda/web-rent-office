<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\Api\CityController;
use App\Http\Controller\Api\OfficeSpaceController;
use App\Http\Controller\Api\BookingTransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/city/{city:slug}', [CityController::class, 'show']);
Route::apiResource('/cities', CityController::class);

Route::get('/office/{officeSpace:slug}', [OfficeSpaceController::class, 'show']);
Route::apiResource('/offices', OfficeSpaceController::class);

Route::post('/booking-transaction', [BookingTransactionController::class, 'store']);

Route::post('/check-booking', [BookingTransactionController::class, 'booking_details']);