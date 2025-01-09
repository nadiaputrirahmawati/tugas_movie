<?php

namespace Database\Factories;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Cast_MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => 1,
            'movie_id' => Movie::inRandomOrder()->first()->id,
            'cast_id' => 1,
            'cast_id' => Cast::inRandomOrder()->first()->id,
        ];
    }
}
