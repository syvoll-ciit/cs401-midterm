<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'program' => fake()->randomElement(['Computer Science', 'Engineering', 'Business', 'Arts']),
            'enrollment_year' => fake()->numberBetween(2018, 2023),
            'birthday' => fake()->dateTimeBetween('-30 years', '-18 years'),
            'user_id' => \App\Models\User::factory()->student(),
        ];
    }
}
