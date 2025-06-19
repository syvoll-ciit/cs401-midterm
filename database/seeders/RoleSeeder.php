<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'role_name' => 'admin',
            'description' => 'System Administrator',
        ]);
        
        Role::factory()->create([
            'role_name' => 'teacher',
            'description' => 'Course Instructor',
        ]);
        
        Role::factory()->create([
            'role_name' => 'student',
            'description' => 'Student User',
        ]);
    }
}
