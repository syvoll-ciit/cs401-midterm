<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role_name = fake()->randomElement(['admin', 'teacher', 'student']);
        return [
            "role_name" => $role_name,
            "description" => fake()->sentence,
        ];
    }
}
