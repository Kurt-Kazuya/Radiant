<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Reservation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
{
    if (config('app.env') === 'production') {
        \URL::forceScheme('https');
    }

    View::composer('layouts.admin', function ($view) {
        $pendingReservationsCount = Reservation::where('status', 'pending')->count();
        $view->with('pendingReservationsCount', $pendingReservationsCount);
    });
}
}
