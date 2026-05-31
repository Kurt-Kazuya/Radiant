<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        // handle booking logic here
    }
}