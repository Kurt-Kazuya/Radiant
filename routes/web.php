<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GuestReservationController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminPaymentController;


// Public Guest Pages 

Route::get('/', fn() => view('home'))->name('home');
Route::get('/accommodations', fn() => view('accommodations'))->name('accommodations');
Route::get('/dining', fn() => view('dining'))->name('dining');
Route::get('/amenities', fn() => view('amenities'))->name('amenities');
Route::get('/offers', fn() => view('offers'))->name('offers');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/privacy', fn() => view('privacy'))->name('privacy');
Route::get('/terms', fn() => view('terms'))->name('terms');
Route::post('/contact', function(\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'company' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:50',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);
    \App\Models\ContactMessage::create($validated);
    return back()->with('success', 'Thank you for your message. We will get back to you shortly.')
                 ->with('sent_data', $validated);
})->name('contact.post');
Route::get('/reservations/availability', [ReservationsController::class, 'availability'])->name('reservations.availability');
Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');

//  Auth Routes 
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

//  Guest Checkout & Bookings
Route::get('/checkout',  [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');






// Admin Routes (auth + admin role required)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Rooms CRUD
    Route::resource('rooms', AdminRoomController::class);

    // Reservations — list + custom confirm/cancel + delete
    Route::get('/reservations',              [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::patch('/reservations/{id}/confirm',[AdminReservationController::class, 'confirm'])->name('reservations.confirm');
    Route::patch('/reservations/{id}/cancel', [AdminReservationController::class, 'cancel'])->name('reservations.cancel');
    Route::delete('/reservations/{id}',       [AdminReservationController::class, 'destroy'])->name('reservations.destroy');

    // Payments
    Route::get('/payments',                [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::patch('/payments/{id}/mark-paid',[AdminPaymentController::class, 'markPaid'])->name('payments.markPaid');
    Route::delete('/payments/{payment}',   [AdminPaymentController::class, 'destroy'])->name('payments.destroy');

    // Contact Messages
    Route::get('/contact-messages',                 [\App\Http\Controllers\Admin\AdminContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::patch('/contact-messages/{id}/mark-read',[\App\Http\Controllers\Admin\AdminContactMessageController::class, 'markRead'])->name('contact-messages.markRead');
    Route::delete('/contact-messages/{id}',         [\App\Http\Controllers\Admin\AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

    // Reports (admin-only)
    Route::get('/reports',            [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf',        [ReportController::class, 'exportPDF'])->name('reports.pdf');
    Route::get('/reports/excel',      [ReportController::class, 'exportExcel'])->name('reports.excel');
    Route::get('/reports/csv',        [ReportController::class, 'exportCSV'])->name('reports.csv');
    Route::post('/reports/import',    [ReportController::class, 'import'])->name('reports.import');
});