<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Carbon\Carbon;
use App\Models\Room;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Reservation Stats
        $totalReservations = \App\Models\Reservation::count();
        $upcomingCheckins = \App\Models\Reservation::where('check_in', '>=', now())->count();
        $todaysCheckins = \App\Models\Reservation::whereDate('check_in', \Carbon\Carbon::today())->get();
        $todaysCheckouts = \App\Models\Reservation::whereDate('check_out', \Carbon\Carbon::today())->get();
        $todayCheckoutsCount = $todaysCheckouts->count();

        // Room Stats
        $totalRooms = Room::count();
        $availableRooms = Room::where('available', true)->count();
        $bookedRooms = Room::where('available', false)->count();

        return view('admin.dashboard', compact(
            'totalReservations',
            'upcomingCheckins',
            'todaysCheckins',
            'todaysCheckouts',
            'todayCheckoutsCount',
            'totalRooms',
            'availableRooms',
            'bookedRooms'
        ));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
