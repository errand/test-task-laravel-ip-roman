<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@test.test',
            'password' => '$2y$10$3nBNTMKmqmlGOpnMwNhybeldWRw6Jb5fAWBtzMy7ni/1NXNnPJBZ.', // asdfasdf
        ]);

        \App\Models\User::factory()->create([
            'name' => 'tester',
            'email' => 'test@test.test',
            'password' => '$2y$10$3nBNTMKmqmlGOpnMwNhybeldWRw6Jb5fAWBtzMy7ni/1NXNnPJBZ.', // asdfasdf
        ]);
    }
}
