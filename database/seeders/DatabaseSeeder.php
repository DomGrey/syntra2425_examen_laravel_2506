<?php

namespace Database\Seeders;
use App\Models\Trip;
use App\Models\Booking;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $regions = ['west', 'east', 'north', 'central'];
    
    // Create one trip for each region
    foreach ($regions as $region) {
        Trip::factory()
            ->state(['region' => $region])
            ->has(
                Booking::factory()
                    ->count(4)
                    ->state(function () {
                        return [
                            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled'])
                        ];
                    })
            )
            ->create();
    }
    
    // Create remaining trips
    Trip::factory()
        ->count(2)
        ->has(
            Booking::factory()
                ->count(4)
                ->state(function () {
                    return [
                        'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled'])
                    ];
                })
        )
        ->create();
    }
}
