<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class GuestReservationController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'room_type' => 'required|string|max:100',
            'guests' => 'required|integer|min:1',
        ]);

        Reservation::create($validated);

        return redirect('/reserve')->with('success', 'Reservation submitted successfully!');
    }
}
