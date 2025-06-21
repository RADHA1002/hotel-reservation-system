<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_id' => \App\Models\Hotel::factory(),
            'room_type' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'capacity' => $this->faker->numberBetween(1, 4),
            'available' => $this->faker->boolean(80),
            'image' => 'https://picsum.photos/seed/' . $this->faker->word . '/800/600',
        ];
    }
}
