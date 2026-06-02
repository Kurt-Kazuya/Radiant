<?php

namespace App\Http\Controllers;

use App\Services\RoomAvailabilityService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function __construct(
        private RoomAvailabilityService $availabilityService
    ) {}

    public function index(Request $request)
    {
        $checkIn  = $request->get('check_in', date('Y-m-d'));
        $checkOut = $request->get('check_out', date('Y-m-d', strtotime('+1 day')));

        $availability = $this->availabilityService->getDisplayAvailability($checkIn, $checkOut);
        $nights       = max(1, Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut)));

        return view('reservations', compact('availability', 'nights', 'checkIn', 'checkOut'));
    }
}
