<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rapport>
 */
class RapportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => fake()->filePath(),
            'title' => fake()->sentence(),
            'achieved' => fake()->numberBetween(0,1),
            'observation' => fake()->sentences(6, true),
            'corbeille' => fake()->numberBetween(0,1),
            'status_id' => 1,
            'user_id' => fake()->numberBetween(1,18),
        ];
    }
}
