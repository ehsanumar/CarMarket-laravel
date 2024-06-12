<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Define roles with their assigned permissions
        $roles = [
            'seller',
            'guest',
            'super-admin',
            'buyer',

        ];

        // Create roles
        foreach ($roles as $name) {
            $role = Role::create(['name' => $name]);
        }

        // Create a user with the ssd-admin role
        $user = User::create([
            'name' => 'arkan', // Replace with desired name
            'password' => '12121212', // Replace with a strong password
            'email' => 'arkan@gmail.com',
            'phone' => '09123456789',
            'type' => 'super-admin'
        ]);

        $user->assignRole('super-admin');
    }
}
