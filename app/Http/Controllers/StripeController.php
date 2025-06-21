<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Room;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey('sk_test_51RbksMC5WZJmg4XmCQ4seuEdkoKmP6HXd8KAxhn4N2cZgBlGTt8Om2wNGQvQ10x0H0m3YRzs6oqBwtnnfDrqM6jQ00NDoqw57M');

        try {
            $amount = $request->input('amount', 100);

            // Validate amount
            if ($amount <= 0) {
                return response()->json([
                    'error' => 'Amount must be greater than 0'
                ], 422);
            }

            $paymentIntent = PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            if (str_contains($message, 'card_declined')) {
                return response()->json([
                    'error' => 'Your card was declined. Please check your card details and try again.'
                ], 422);
            }
            return response()->json([
                'error' => 'An error occurred.' . $message
            ], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $roomId = $request->query('room_id');
        $reservationId = $request->query('reservation_id');
        $room = null;
        if ($roomId) {
            $room = Room::with('detail')->find($roomId);
        }
        if ($reservationId) {
            \App\Models\Reservation::where('id', $reservationId)->update(['payment_status' => 1]);
        }
        return view('front.paymentSuccess', compact('room'));
    }
}
