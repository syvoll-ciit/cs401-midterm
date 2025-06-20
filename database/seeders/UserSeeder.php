<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'user_name' => 'admin',
        ]);

        // Create 5 teacher users
        User::factory(5)->create();

        // Create 20 student users
        User::factory(20)->create();

        // Attach roles to users
        $adminRole = Role::where('role_name', 'admin')->first();
        $teacherRole = Role::where('role_name', 'teacher')->first();
        $studentRole = Role::where('role_name', 'student')->first();

        // Attach admin role to the admin user
        $adminUser = User::where('user_name', 'admin')->first();
        if ($adminUser && $adminRole) {
            $adminUser->roles()->attach($adminRole->id);
        }

        // Attach teacher role to 5 users (excluding admin)
        $teacherUsers = User::where('user_name', '!=', 'admin')->take(5)->get();
        foreach ($teacherUsers as $user) {
            if ($teacherRole) {
                $user->roles()->attach($teacherRole->id);
            }
        }

        // Attach student role to the rest
        $studentUsers = User::whereDoesntHave('roles', function($q) use ($adminRole, $teacherRole) {
            $ids = [];
            if ($adminRole) $ids[] = $adminRole->id;
            if ($teacherRole) $ids[] = $teacherRole->id;
            $q->whereIn('role_id', $ids);
        })->get();
        foreach ($studentUsers as $user) {
            if ($studentRole) {
                $user->roles()->attach($studentRole->id);
            }
        }
    }
}
