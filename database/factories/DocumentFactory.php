<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
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
            'recommandation' => fake()->sentences(5,true),
            'achieved' => fake()->numberBetween(0,1),
            'corbeille' => fake()->numberBetween(0,1),
            'theme_id' => fake()->numberBetween(1,6),
            'user_id' => fake()->numberBetween(1,25),
        ];
    }
}
