<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guest_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'check_in' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'check_out' => $this->faker->dateTimeBetween('+2 weeks', '+3 weeks'),
            'room_type' => $this->faker->randomElement(['Single', 'Double', 'Suite']),
            'guests' => $this->faker->numberBetween(1, 4),
        ];
    }
}
