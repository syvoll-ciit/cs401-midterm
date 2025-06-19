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
            'role_id' => Role::where('role_name', 'admin')->first()->id,
        ]);

        // Create 5 teacher users
        User::factory(5)->create([
            'role_id' => Role::where('role_name', 'teacher')->first()->id,
        ]);

        // Create 20 student users
        User::factory(20)->create([
            'role_id' => Role::where('role_name', 'student')->first()->id,
        ]);
    }
}
