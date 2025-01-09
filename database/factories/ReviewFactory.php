<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => 'Aku Tak Membenci Hujan',
            'rating' => $this->faker->randomElement([1,2,3,4,5]),
            'user_id' => 1,
            'user_id' => User::inRandomOrder()->first()->id,
            'movie_id' => 1,
            'movie_id' => Movie::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }
}
