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




//report
use App\Http\Controllers\ReportController;

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/export/pdf', [ReportController::class, 'exportPDF'])->name('reports.pdf');
Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');
Route::get('/reports/export/csv', [ReportController::class, 'exportCSV'])->name('reports.csv');
Route::post('/reports/import', [ReportController::class, 'import'])->name('reports.import');