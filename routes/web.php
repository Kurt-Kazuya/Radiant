<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;


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

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/export/pdf', [ReportController::class, 'exportPDF'])->name('reports.pdf');
Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');
Route::get('/reports/export/csv', [ReportController::class, 'exportCSV'])->name('reports.csv');
Route::post('/reports/import', [ReportController::class, 'import'])->name('reports.import');


//admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminPaymentController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('rooms', AdminRoomController::class);
    Route::resource('reservations', AdminReservationController::class);
    Route::resource('payments', AdminPaymentController::class);
    Route::patch('/reservations/{id}/confirm', [AdminReservationController::class, 'confirm'])->name('reservations.confirm');
    Route::patch('/reservations/{id}/cancel', [AdminReservationController::class, 'cancel'])->name('reservations.cancel');
    Route::patch('/payments/{id}/mark-paid', [AdminPaymentController::class, 'markPaid'])->name('payments.markPaid');
});



// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');