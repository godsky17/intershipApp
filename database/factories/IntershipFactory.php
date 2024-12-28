<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intership>
 */
class IntershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nbrUser = count(User::get());
        return [
            'last_graduate' => fake()->word(),
            'last_graduate_date' => fake()->date(),
            'last_graduate_school' => fake()->words(3, true),
            'skills' => fake()->words(3, true),
            'new_skills' => fake()->words(3, true),
            'pair' => fake()->numberBetween(0,1),
            'pairName' => fake()->name(),
            'computer' => fake()->numberBetween(0,1),
            'status_id' => fake()->numberBetween(1,3),
            'achieved' => fake()->numberBetween(0,1),
            'user_id' => fake()->numberBetween(1,$nbrUser)
        ];
    }
}
