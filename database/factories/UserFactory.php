<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nbrRole = count(Role::get());
        return [
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'birth' => fake()->date(),
            'sexe' => fake()->numberBetween(0,1),
            'phone_number' => fake()->phoneNumber(),
            'sector' => fake()->domainName(),
            'motivation' => fake()->sentences(5, true),
            'objectif' => fake()->sentences(3, true),
            'status' => fake()->numberBetween(0,1),
            'online' => fake()->numberBetween(0,1),
            'achieved' => fake()->numberBetween(0,1),
            'role_id' => fake()->numberBetween(1, 4),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => fake()->numberBetween(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
