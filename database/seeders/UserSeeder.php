<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();


        \App\Models\User::factory()->create([
            'name' => 'Thant Zaw',
            'email' => 'thantzawinfo6@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123123123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'testadmin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123123123'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => bcrypt('123123123'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Author',
            'email' => 'author@gmail.com',
            'role' => 'author',
            'password' => bcrypt('123123123'),
        ]);
    }
}
