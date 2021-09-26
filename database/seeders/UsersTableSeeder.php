<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Demo Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
         // teacher
         DB::table('users')->insert([
            'role' => 'teacher',
            'name' => 'Demo Teacher',
            'email' => 'teacher@mail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
         // student
         DB::table('users')->insert([
            'role' => 'student',
            'name' => 'Demo Student',
            'email' => 'student@mail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
