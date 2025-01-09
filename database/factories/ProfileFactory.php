<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'biodata' => $this->faker->sentence(),
            'age' => $this->faker->numerify(),
            'address' => $this->faker->address(),
            'avatar' => $this->faker->image(),
            'user_id' => 1,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
