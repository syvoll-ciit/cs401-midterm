<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::all();

        if ($teachers->isEmpty()) {
            echo "No teachers found. Please run TeacherSeeder first.\n";
            return;
        }

        Course::factory(10)->create([
            'teacher_id' => fn() => $teachers->random()->id,
        ]);
    }
}
