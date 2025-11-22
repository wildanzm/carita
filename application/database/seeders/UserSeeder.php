<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
        ]);
        $user->assignRole('user');
    }
}
