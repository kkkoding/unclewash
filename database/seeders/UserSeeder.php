<?php

namespace Database\Seeders;

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
         User::create([
            'name' => 'Uncle Bee',
            'phone' => '08123456789',
            'email' => 'unclebee@lulabytes.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
