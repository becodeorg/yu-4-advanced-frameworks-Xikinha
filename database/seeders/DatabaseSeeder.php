<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::factory(9)->create();

        // Create specific user with known password
        User::create([
            'username' => 'Fran',
            'email' => 'fran@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
