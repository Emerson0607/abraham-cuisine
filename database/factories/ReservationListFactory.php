<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservationList>
 */
class ReservationListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_updated' => $this->faker->dateTime(),
            'code' => $this->faker->uuid,
            'schedule' => $this->faker->dateTimeBetween('+1 days', '+1 week'),
            'client' => $this->faker->name,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed', 'cancelled']),
            'action' => $this->faker->sentence,
        ];
    }
}
