<?php

namespace App\Services;

use Throwable;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Http;

class GroqService
{
    protected $endpoint = 'https://api.groq.com/openai/v1/chat/completions';

    public function chatWithMixtral($messages)
    {
        $response = Http::withToken(env('GROQ_API_KEY'))->post($this->endpoint, [
            'model' => 'meta-llama/llama-4-scout-17b-16e-instruct',
            'messages' => $messages,
        ]);

        if ($response->successful()) {
            return $response->json()['choices'][0]['message']['content'];
        } else {
            throw new \Exception("GROQ API error: " . $response->body());
        }
    }

    public function handleUserPrompt($prompt)
    {
        $lower = strtolower($prompt);

        // Check for reservation keywords
        $reservationKeywords = ['book', 'reserve', 'make a reservation', 'make booking', 'make reservation'];
        $hasReservationKeywords = false;
        foreach ($reservationKeywords as $keyword) {
            if (str_contains($lower, $keyword)) {
                $hasReservationKeywords = true;
                break;
            }
        }

        // Check for email and name
        $hasEmail = preg_match('/email:\s*\S+@\S+\.\S+/i', $prompt);
        $hasName = preg_match('/name:\s*\w+/i', $prompt);
        $hasDates = preg_match('/check\s+in:\s*\w+/i', $prompt) && preg_match('/check\s+out:\s*\w+/i', $prompt);

        // Prioritize reservation if it has all required fields
        if ($hasReservationKeywords && $hasEmail && $hasName && $hasDates) {
            return $this->makeReservationFromPrompt($prompt);
        }

        // Room Search
        if (str_contains($lower, 'find') || str_contains($lower, 'search') || str_contains($lower, 'available')) {
            return $this->searchRooms($prompt);
        }

        // Room Details
        if (str_contains($lower, 'details') || str_contains($lower, 'information') || str_contains($lower, 'features')) {
            return $this->getRoomDetails($prompt);
        }

        // Availability Check
        if (str_contains($lower, 'available') || str_contains($lower, 'check') || str_contains($lower, 'dates')) {
            return $this->checkRoomAvailability($prompt);
        }

        // General room-related queries
        if (str_contains($lower, 'room')) {
            return $this->chatWithMixtral([
                ['role' => 'system', 'content' => 'You are a professional hotel reservation assistant. Focus on providing room-related information.'],
                ['role' => 'user', 'content' => $prompt]
            ]);
        }

        // Fallback to GROQ AI for other queries
        return $this->chatWithMixtral([
            ['role' => 'user', 'content' => $prompt]
        ]);
    }

    protected function getRoomDetails($prompt)
    {
        // Extract room type from prompt
        preg_match('/room type ([\w]+)/i', $prompt, $matches);
        $roomType = $matches[1] ?? null;

        if (!$roomType) {
            return "Please specify a room type to view details.";
        }

        // Get room details
        $room = Room::where('room_type', $roomType)
            ->with(['detail'])
            ->first();

        if (!$room) {
            return "No room found with type: {$roomType}";
        }

        // Format the response as HTML
        $result = "<div class='uk-overflow-auto'>\n";
        $result .= "<div class='uk-card uk-card-default uk-card-body'>\n";
        $result .= "<h3 class='uk-card-title'>{$room->room_type}</h3>\n";

        // Add images if available
        if ($room->detail) {
            $images = [
                $room->detail->image_1,
                $room->detail->image_2,
                $room->detail->image_3,
                $room->detail->image_4
            ];
            
            $images = array_filter($images); // Remove any null/empty images
            
            if (!empty($images)) {
                $result .= "<div class='uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-text-center' uk-grid>\n";
                foreach ($images as $image) {
                    $result .= sprintf("<div>\n<img src='%s' alt='%s' class='uk-border-rounded uk-box-shadow-small' style='max-height: 150px;'>\n</div>\n", 
                        $image,
                        $room->room_type
                    );
                }
                $result .= "</div>\n";
            }
        }

        // Add room details
        $result .= "<div class='uk-margin-top'>\n";
        $result .= "<div class='uk-grid-small uk-child-width-1-2' uk-grid>\n";
        $result .= sprintf("<div><strong>Price:</strong> $%d/night</div>\n", $room->price);
        $result .= sprintf("<div><strong>Max Guests:</strong> %d</div>\n", $room->capacity);
        $result .= sprintf("<div><strong>Available:</strong> %s</div>\n", $room->available ? 'Yes' : 'No');
        $result .= "</div>\n";

        // Add description if available
        if ($room->detail && $room->detail->description) {
            $result .= "<div class='uk-margin-top'>\n";
            $result .= "<h4>Description</h4>\n";
            $result .= "<p>{$room->detail->description}</p>\n";
            $result .= "</div>\n";
        }

        $result .= "</div>\n";
        $result .= "</div>\n";
        return $result;
    }

    protected function searchRooms($prompt)
    {
        // Extract room type from prompt
        preg_match('/room type ([\w]+)/i', $prompt, $matches);
        $roomType = $matches[1] ?? null;

        // Get all available rooms
        $rooms = \App\Models\Room::where('available', true);
        
        // If room type specified
        if ($roomType) {
            // Try to find exact match
            $rooms->where('room_type', $roomType);
        }

        $availableRooms = $rooms->get();

        if ($availableRooms->isEmpty()) {
            // If no rooms found with specific type, show all available rooms
            $allRooms = \App\Models\Room::where('available', true)->get();
            if ($allRooms->isEmpty()) {
                return "No rooms available at the moment. Please check back later or try different dates.";
            }
            $result = "No rooms found matching your search. Here are all available rooms:\n\n";
            $result .= "<div class='uk-overflow-auto'>\n";
            $result .= "<table class='uk-table uk-table-striped uk-table-hover uk-table-small'>\n";
            $result .= "<thead>\n<tr>\n";
            $result .= "<th class='uk-width-expand'>Room Type</th>\n";
            $result .= "<th class='uk-width-small'>Price/night</th>\n";
            $result .= "<th class='uk-width-small'>Max Guests</th>\n";
            $result .= "</tr>\n</thead>\n";
            $result .= "<tbody>\n";
            foreach ($allRooms as $room) {
                $result .= sprintf("<tr>\n<td>%s</td>\n<td>$%d/night</td>\n<td>%d</td>\n</tr>\n", $room->room_type, $room->price, $room->capacity);
            }
            $result .= "</tbody>\n";
            $result .= "</table>\n";
            $result .= "</div>\n";
            return $result;
        }

        $result = "Room Availability Table:\n\n";
        $result .= "<div class='uk-overflow-auto'>\n";
        $result .= "<table class='uk-table uk-table-striped uk-table-hover uk-table-small'>\n";
        $result .= "    <thead>\n";
        $result .= "        <tr>\n";
        $result .= "            <th class='uk-width-expand'>Room Type</th>\n";
        $result .= "            <th class='uk-width-small'>Price/night</th>\n";
        $result .= "            <th class='uk-width-small'>Max Guests</th>\n";
        $result .= "        </tr>\n";
        $result .= "    </thead>\n";
        $result .= "    <tbody>\n";
        foreach ($availableRooms as $room) {
            $result .= sprintf("<tr>\n<td>%s</td>\n<td>$%d/night</td>\n<td>%d</td>\n</tr>\n", $room->room_type, $room->price, $room->capacity);
        }
        $result .= "    </tbody>\n";
        $result .= "</table>\n";
        $result .= "</div>\n";
        return $result;
    }

    protected function checkRoomAvailability($prompt)
    {
        // Extract dates from prompt
        preg_match('/from\s+(\d{1,2}\s+\w+\s+\d{4})\s+to\s+(\d{1,2}\s+\w+\s+\d{4})/i', $prompt, $matches);
        
        if (count($matches) !== 3) {
            return "Please specify check-in and check-out dates (e.g., 'from June 15 2025 to June 20 2025')";
        }

        $checkIn = Carbon::parse($matches[1]);
        $checkOut = Carbon::parse($matches[2]);

        if ($checkIn >= $checkOut) {
            return "Check-out date must be after check-in date.";
        }

        // Get all rooms
        $rooms = \App\Models\Room::all();
        $availableRooms = [];

        foreach ($rooms as $room) {
            // Check if room is available for the dates
            $isAvailable = !\App\Models\Reservation::where('room_id', $room->id)
                ->where(function ($query) use ($checkIn, $checkOut) {
                    $query->where(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    })
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>', $checkIn);
                    })
                    ->orWhere(function ($q) use ($checkIn, $checkOut) {
                        $q->where('check_in', '<', $checkOut)
                            ->where('check_out', '>=', $checkOut);
                    });
                })
                ->exists();

            if ($isAvailable) {
                $availableRooms[] = $room;
            }
        }

        if (empty($availableRooms)) {
            return "No rooms available for those dates. Would you like to check different dates?";
        }

        $result = "Available Rooms for {$checkIn->format('F j, Y')} to {$checkOut->format('F j, Y')}\n";
        $result .= "| Room Type | Price | Max Guests |\n";
        $result .= "|-----------|-------|------------|\n";
        foreach ($availableRooms as $room) {
            $result .= sprintf("| %-12s | $%5d/night | %11d |\n", 
                $room->room_type, 
                $room->price, 
                $room->max_guests
            );
        }
        return $result;
    }

    protected function searchReservations($prompt)
    {
        $name = $this->extractNameFromPrompt($prompt);

        $reservations = Reservation::where('guest_name', 'LIKE', "%{$name}%")
            ->orWhere('email', 'LIKE', "%{$name}%")
            ->get();

        if ($reservations->isEmpty()) {
            return "No reservations found for '{$name}'.";
        }

        return $reservations->map(function ($res) {
            return "{$res->guest_name} ({$res->email}) — {$res->room_type} room from {$res->check_in} to {$res->check_out} for {$res->guests} guest(s).";
        })->join("\n");
    }

    protected function extractNameFromPrompt($prompt)
        {
            preg_match('/for\s+([\w@.\s]+)/i', $prompt, $matches);
            return trim($matches[1] ?? '');
        }
        protected function makeReservationFromPrompt($prompt)
        {
            $response = $this->chatWithMixtral([
                [
                    'role' => 'system',
                    'content' => 'Extract reservation details from the user prompt and return as JSON. Fields: guest_name, email, check_in, check_out, room_type, guests. Dates must be ISO format (YYYY-MM-DD). Return JSON only.'
                ],
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ]);
        
            // Extract JSON part
            preg_match('/\{.*\}/s', $response, $matches);
            $json = $matches[0] ?? '{}';
        
            try {
                $data = json_decode($json, true);
        
                if (
                    isset($data['guest_name'], $data['email'], $data['check_in'], $data['check_out'], $data['room_type'], $data['guests'])
                ) {
                    Reservation::create([
                        'guest_name' => $data['guest_name'],
                        'email' => $data['email'],
                        'check_in' => Carbon::parse($data['check_in'])->toDateString(),
                        'check_out' => Carbon::parse($data['check_out'])->toDateString(),
                        'room_type' => $data['room_type'],
                        'guests' => $data['guests'],
                    ]);
        
                    return "Reservation successfully made for {$data['guest_name']} from {$data['check_in']} to {$data['check_out']} in a {$data['room_type']} room.";
                }
        
                return "Failed to extract valid reservation data.";
            } catch (Throwable $e) {
                return "Error parsing reservation: " . $e->getMessage();
            }
        }        
}
