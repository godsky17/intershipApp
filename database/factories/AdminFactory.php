<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{

    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'post' => fake()->word(),
            'contrat_type' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' =>fake()->phoneNumber(),
            'status' => fake()->numberBetween(0,1),
            'online' => fake()->numberBetween(0,1),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => fake()->numberBetween(10),
            'role_id' => fake()->numberBetween(1, 4),
        ];
    }
}
