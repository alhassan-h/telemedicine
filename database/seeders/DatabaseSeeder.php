<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'first_name'    => 'Aisha',
            'last_name'     => "Ma'aruf",
            'gender'        => 'female',
            'email'         => 'aisha@gmail.com',
            'phone'         => '08123456789',
            'usertype'      => 'admin',
            'password'      => Hash::make('123456789'),
        ]);

    }
}
