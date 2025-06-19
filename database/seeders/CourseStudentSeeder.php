<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $students = Student::all();

        if ($courses->isEmpty() || $students->isEmpty()) {
            echo "Courses or students not found. Please run CourseSeeder and StudentSeeder first.\n";
            return;
        }

        foreach ($students as $student) {
            $randomCourses = $courses->random(rand(1, 4));
            $student->courses()->attach($randomCourses);
        }
    }
}
