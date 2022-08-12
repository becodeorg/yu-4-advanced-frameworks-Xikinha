<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        // Create 9 random users in the database
        \App\Models\User::factory(9)->create();

        // Create specific user with known password
        \App\Models\User::factory()->create([
            'username' => 'Franziska',
            'email' => 'franziska@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
