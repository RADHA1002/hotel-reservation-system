<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reserve');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string',
            'email' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_type' => 'required|string',
            'guests' => 'required|integer|min:1',
        ]);

        Reservation::create($validated);

        return redirect('/reserve')->with('success', 'Reservation successful!');
    }

    public function index()
    {
        $reservations = Reservation::latest()->paginate(10); // Show 10 per page
        return view('admin.reservations.index', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'guest_name' => 'required|string|max:255',
        'email' => 'required|email',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after_or_equal:check_in',
        'room_type' => 'required|string|max:100',
        'guests' => 'required|integer|min:1',
    ]);

    $reservation = Reservation::findOrFail($id);
    $reservation->update($validated);

    return redirect()->back()->with('success', 'Reservation updated.');
}
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted!');
    }

    /**
     * Send booking confirmation email to the guest.
     */
    public function sendConfirmation($id)
    {
        $reservation = Reservation::findOrFail($id);
        // You should have a ReservationConfirmationMail mailable. If not, create a placeholder.
        try {
            \Mail::to($reservation->email)->send(new \App\Mail\ReservationConfirmationMail($reservation));
            return redirect()->route('admin.reservations.index')->with('success', 'Booking confirmation sent!');
        } catch (\Exception $e) {
            return redirect()->route('admin.reservations.index')->with('error', 'Failed to send confirmation: ' . $e->getMessage());
        }
    }
    public function togglePayment($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->payment_status = !$reservation->payment_status;
        $reservation->save();

        return back()->with('success', 'Payment status updated.');
    }

    public function toggleCheckInStatus($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->checkin_status === 'CHECK_IN') {
            $reservation->checkin_status = 'CHECK_OUT';
        } elseif ($reservation->checkin_status === 'CHECK_OUT') {
            $reservation->checkin_status = null;
        } else {
            $reservation->checkin_status = 'CHECK_IN';
        }
        $reservation->save();

        return back()->with('success', 'Check-in status updated.');
    }
}