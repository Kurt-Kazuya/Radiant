<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\ReservationApiController;
use App\Http\Controllers\Api\PaymentApiController;

//Rooms
Route::get('/rooms', [RoomApiController::class, 'index']);
Route::get('/rooms/{id}', [RoomApiController::class, 'show']);
Route::post('/rooms', [RoomApiController::class, 'store']);
Route::put('/rooms/{id}', [RoomApiController::class, 'update']);
Route::delete('/rooms/{id}', [RoomApiController::class, 'destroy']);
Route::get('/available-rooms', [RoomApiController::class, 'available']);

//Reservations
Route::get('/reservations', [ReservationApiController::class, 'index']);
Route::get('/reservations/{id}', [ReservationApiController::class, 'show']);
Route::post('/reservations', [ReservationApiController::class, 'store']);
Route::put('/reservations/{id}', [ReservationApiController::class, 'update']);
Route::delete('/reservations/{id}', [ReservationApiController::class, 'destroy']);

//Payments
Route::get('/payments', [PaymentApiController::class, 'index']);
Route::get('/payments/{id}', [PaymentApiController::class, 'show']);
Route::post('/payments', [PaymentApiController::class, 'store']);
Route::put('/payments/{id}', [PaymentApiController::class, 'update']);
Route::delete('/payments/{id}', [PaymentApiController::class, 'destroy']);