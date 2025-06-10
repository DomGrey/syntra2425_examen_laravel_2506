<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Booking::class;
    public function definition(): array
    {
        return [
            //
            'trip_id' => Trip::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'number_of_people' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),

        ];
    }
}
