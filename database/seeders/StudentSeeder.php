<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentUsers = User::whereHas('role', function($query) {
            $query->where('role_name', 'student');
        })->get();

        if ($studentUsers->isEmpty()) {
            echo "No student users found. Please run UserSeeder first.\n";
            return;
        }

        foreach ($studentUsers as $user) {
            Student::factory()->create([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ]);
        }
    }
}
