<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Ian',
            'email' => 'iaay@protonmail.com',
            'password' => bcrypt('tagsRus'),
        ]);

        \App\User::create([
            'name' => 'John',
            'email' => 'john@email.com',
            'password' => bcrypt('tagsRus'),
        ]);
    }
}
