<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.test',
            'password' => '$2y$10$gWePNHluW.CaV50c159nBeUoepprNK2QHPZUSUHiBtuYFjHz2EheW',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.test',
            'password' => '$2y$10$X0H7fZHZNz1PReSkhWXunOtdhRqgeiiZp5.KIDWO0IgVmmcJmSbd2',
        ]);

        DB::table('users')->insert([
            'name' => 'Other User',
            'email' => 'otheruser@example.test',
            'password' => '$2y$10$jDzYfSpyW3zlQDJpxCL4SuMWO7p8Y8.W87uetDYzLjGTdb1Ck.n4S',
        ]);
    }
}
