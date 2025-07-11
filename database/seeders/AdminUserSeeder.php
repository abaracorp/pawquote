<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsers = [
    [
        'name' => 'Admin Pawquote',
        'email' => 'admin@pawquote.com',
        'email_verified_at' => now(),
        'password' => Hash::make('password123'),
        'role' => 1, 
        'status' => 0, 
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Admin IT',
        'email' => 'admin@mail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('password123'),
        'role' => 0, 
        'status' => 0, 
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ],
    
];

User::insert($adminUsers);
    }
}
