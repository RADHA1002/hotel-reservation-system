<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate tables in reverse order of dependencies
        \DB::table('bookings')->truncate();
        \DB::table('room_details')->truncate();
        \DB::table('reservations')->truncate();
        \DB::table('rooms')->truncate();
        \DB::table('users')->truncate();

        // Re-enable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call([
            UserSeeder::class,
            RoomSeeder::class,
            ReservationSeeder::class,
            RoomDetailSeeder::class,
        ]);
    }
}
