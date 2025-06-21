<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('room_details')->truncate();
        $rooms = \App\Models\Room::all();
        foreach ($rooms as $room) {
            \App\Models\RoomDetail::factory()->create(['room_id' => $room->id]);
        }
    }
}
