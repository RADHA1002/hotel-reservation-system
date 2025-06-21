<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'guest_name',
        'email',
        'check_in',
        'check_out',
        'room_type',
        'guests',
        'status',
        'payment_status',
    ];

    protected $dates = [
        'check_in',
        'check_out',
    ];

    /**
     * Get dummy room data based on room_type
     */
    public function getRoomAttribute()
    {
        // Return a simple object with the room_type since we don't have a room relationship
        return (object) [
            'room_type' => $this->room_type,
            'room_number' => 'N/A',
            'price' => 0,
        ];
    }
}
