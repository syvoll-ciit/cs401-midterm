<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'subject' => fake()->randomElement(['Database Systems', 'Web Development', 'Algorithms', 'Calculus', 'Marketing']),
            'course_code' => strtoupper(fake()->bothify('??###')),
            'credits' => fake()->numberBetween(1, 4),
            'description' => fake()->paragraph(),
            'teacher_id' => \App\Models\Teacher::factory(),
        ];
    }
}
