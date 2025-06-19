<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherUsers = User::whereHas('role', function($query) {
            $query->where('role_name', 'teacher');
        })->get();

        if ($teacherUsers->isEmpty()) {
            echo "No teacher users found. Please run UserSeeder first.\n";
            return;
        }

        foreach ($teacherUsers as $user) {
            Teacher::factory()->create([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ]);
        }
    }
}
