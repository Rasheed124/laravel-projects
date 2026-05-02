<?php
namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an Admin/Test User
        User::factory()->create([
            'name'     => 'Admin User',
            'username' => 'admin',
            'email'    => 'admin@blognest.com',
            'password' => Hash::make('password123'),
            'country'  => 'Nigeria',
            'city'     => 'Lagos',
            'role' => Role::Admin,
        ]);

        // Create 10 random Authors
        User::factory(10)->create();
    }
}
