<?php

namespace Database\Factories;
use App\Models\Trip;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Trip::class;
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(4),
            'region' => $this->faker->randomElement(['west', 'east', 'north', 'central']),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+6 months')->format('Y-m-d'),
            'duration_days' => $this->faker->numberBetween(1, 10),
            'price_per_person' => $this->faker->randomFloat(2, 100, 2500),

        ];
    }
}
