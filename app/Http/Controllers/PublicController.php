<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Hotel;
use App\Models\RoomDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function rooms() {
        $rooms = Room::where('available', true)
            ->paginate(4);
        $hotel = Hotel::first();
        return view('front.rooms', compact('rooms', 'hotel'));
    }
    
    public function home() {
        $rooms = Room::where('available', true)->take(4)->orderBy('id', 'desc')->get();
        return view('home', compact('rooms'));
    }

    public function roomDetail($id) {
        $room = Room::where('id',$id)->first();
        $roomDetail = RoomDetail::where('room_id',$id)->first();
        $rooms = Room::where('available', true)->orderBy('id', 'desc')->take(3)->get();
        $hotel = Hotel::where('id',$room->hotel_id)->first();
        return view('front.roomDetail', compact('room', 'roomDetail', 'rooms', 'hotel'));
    }

    public function restaurant() {
        return view('front.restaurant');
    }

    public function index()
    {
        return view('home');
    }

    public function getRooms()
    {
        $rooms = Room::where('available', true)
            ->select('id', 'room_type', 'price', 'capacity')
            ->get();
        
        return response()->json($rooms);
    }
    
    public function bookRoom(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:4',
            'room_id' => 'required|exists:rooms,id'
        ]);

        $room = Room::findOrFail($request->room_id);

        // Create reservation
        $reservation = Reservation::create([
            'room_id' => $room->id,
            'guest_name' => $request->name,
            'email' => $request->email,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'room_type' => $room->room_type,
            'payment_status' => $request->is_gateway == 1 ? 1 : 0
        ]);

        // Update room availability
        // $room->update(['available' => false]);

        try {
            // Send email directly
            $emailContent = "Thank you for your reservation!\n\n" .
                         "Reservation ID: #{$reservation->id}\n" .
                         "Guest Name: {$request->name}\n" .
                         "Email: {$request->email}\n" .
                         "Check-in: {$request->check_in}\n" .
                         "Check-out: {$request->check_out}\n" .
                         "Guests: {$request->guests}\n" .
                         "Room Type: {$room->room_type}\n\n" .
                         "If you have any questions about your reservation, please contact us.";

            // Log the email attempt
            Log::info('Attempting to send email to: ' . $request->email);
            
            // Send the email
            Mail::raw($emailContent, function($message) use ($request, $reservation) {
                $message->to($request->email)
                      ->subject('Reservation Confirmation #' . $reservation->id);
            });
            
            Log::info('Email sent successfully to: ' . $request->email);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Your booking has been submitted successfully! Please check your email for confirmation.',
                'reservation_id' => $reservation->id
            ]);
            
        } catch (\Exception $e) {
            // Log the full error for debugging
            Log::error('Email sending failed: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
        
            return response()->json([
                'status' => 'error',
                'message' => 'Booking saved, but confirmation email could not be sent. Error: ' . $e->getMessage()
            ], 500);
        }        
    }

    public function askAI(Request $request)
    {
        return view('front.askAi');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Room::with('detail')
            ->where('room_type', 'like', "%$query%")
            ->get()
            ->map(function ($room) {
                return [
                    'id' => $room->id,
                    'room_type' => $room->room_type,
                    'description' => $room->detail->long_description ?? 'No description available',
                ];
            });

        return response()->json($results);
    }
    public function payment($room_id)
    {
        $room = Room::with('detail')->find($room_id);
        return view('front.payment', [
            'room' => $room,
        ]);
    }
}
