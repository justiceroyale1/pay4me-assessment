<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            'email' => 'admin@example.com',
        ];

        $userDoesntExist = User::where($userData)->doesntExist();

        if ($userDoesntExist) {
            User::factory()->create($userData);
        }
    }
}
