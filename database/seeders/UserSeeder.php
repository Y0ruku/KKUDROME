<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => 'admin123',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'tenant',
                'password' => 'tenant123',
                'role' => 'tenant',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}