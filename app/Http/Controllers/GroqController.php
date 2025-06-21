<?php

namespace App\Http\Controllers;

use App\Services\GroqService;
use Illuminate\Http\Request;

class GroqController extends Controller
{
    protected $groq;

    public function __construct(GroqService $groq)
    {
        $this->groq = $groq;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string'
        ]);

        $messages = [
            [
                'role' => 'system',
                'content' => 'You are a professional hotel reservation assistant. You have access to room availability, pricing, and booking systems. 
                
                When a user asks about rooms:
                1. First check room availability for their requested dates
                2. Suggest suitable room types based on their needs
                3. Provide detailed information about room features, amenities, and pricing
                4. Help them make reservations if they decide to proceed
                
                Always provide clear, specific information and be ready to assist with booking processes. 
                If a room is not available, suggest alternative options or nearby dates.',
            ],
            ['role' => 'user', 'content' => $request->prompt],
        ];

        try {
            $response = $this->groq->handleUserPrompt($request->prompt);
            return response()->json(['response' => $response]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        
        // Check if this is a room details request
        if (str_contains($prompt, 'room details')) {
            $response = $this->groq->getRoomDetails($prompt);
        } else {
            $response = $this->groq->searchRooms($prompt);
        }
        
        return response()->json(['response' => $response]);
    }
}
