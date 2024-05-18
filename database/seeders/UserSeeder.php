<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'name' => 'Ibra',
            'prenom' => 'Outis',
            'email' => 'auth@admin.com',
            'sexe' => 'M',
            'role' => 'admin',
            'password' => Hash::make('auth.password')
        ]);
    }
}