<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        
        return [
            'day_of_week' => fake()->randomElement($days),
            'time_slot' => fake()->dateTimeBetween('8:00:00', '17:00:00'),
            'room' => fake()->bothify('Room ?##'),
            'term' => fake()->numberBetween(1, 3),
            'course_id' => \App\Models\Course::factory(),
        ];
    }
}
