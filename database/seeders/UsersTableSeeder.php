<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mats Alkemade',
            'email' => 'matsalkemade@gmail.com',
            'password' => bcrypt('laravel'),
        ]);

        DB::table('users')->insert([
            'name' => 'Robin van Vliet',
            'email' => 'r.vanvliet97@gmail.com',
            'password' => bcrypt('laravel'),
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('laravel'),
        ]);
    }
}
