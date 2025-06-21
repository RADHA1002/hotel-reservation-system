<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Reservation;

class AgentAIController extends Controller
{

public function ask(Request $request)
{
    $question = $request->input('question');

    // Get recent reservations as context
    $reservations = Reservation::latest()->take(5)->get()->map(function($r) {
        return [
            'name' => $r->guest_name,
            'email' => $r->email,
            'check-in' => $r->check_in,
            'check-out' => $r->check_out,
            'room' => $r->room_type,
            'guests' => $r->guests
        ];
    });

    $context = "Here are the 5 most recent hotel reservations:\n";
    foreach ($reservations as $res) {
        $context .= "- {$res['name']} ({$res['email']}) booked a {$res['room']} room from {$res['check-in']} to {$res['check-out']} for {$res['guests']} guest(s)\n";
    }

    $prompt = $context . "\nNow answer this question: " . $question;

    $response = Http::post('http://localhost:11434/api/generate', [
        'model' => 'llama3',
        'prompt' => $prompt,
        'stream' => false
    ]);

    return response()->json([
        'answer' => $response['response'] ?? 'No response from AI.',
    ]);
}
}