<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Radiant Hotel Pangasinan
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Accommodations
Route::get('/accommodations', function () {
    return view('accommodations');
})->name('accommodations');

// Dining
Route::get('/dining', function () {
    return view('dining');
})->name('dining');

// Amenities
Route::get('/amenities', function () {
    return view('amenities');
})->name('amenities');

// Offers
Route::get('/offers', function () {
    return view('offers');
})->name('offers');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Reservations / Book Now
Route::get('/reservations', function () {
    return view('reservations');
})->name('reservations');