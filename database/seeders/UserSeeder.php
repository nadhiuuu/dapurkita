<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nadhifa Admin',
            'email' => 'nadhifa@administrator.test',
            'password' => 'password',
            'role' => 'admin',
            'photo' => null,
        ]);

        User::create([
            'name' => 'Nadhifa User',
            'email' => 'nadhifa@user.test',
            'password' => 'password',
            'role' => 'user',
            'photo' => null,
        ]);
    }
}
