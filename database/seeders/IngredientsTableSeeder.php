<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'id' => 1,
            'name' => 'white rum',
        ]);

        DB::table('ingredients')->insert([
            'id' => 2,
            'name' => 'sparkling water',
        ]);

        DB::table('ingredients')->insert([
            'id' => 3,
            'name' => 'lime juice',
        ]);

        DB::table('ingredients')->insert([
            'id' => 4,
            'name' => 'sugar syrup',
        ]);

        DB::table('ingredients')->insert([
            'id' => 5,
            'name' => 'mint leaves',
        ]);

        DB::table('ingredients')->insert([
            'id' => 6,
            'name' => 'crushed ice',
        ]);

        DB::table('ingredients')->insert([
            'id' => 7,
            'name' => 'coconut milk',
        ]);

        DB::table('ingredients')->insert([
            'id' => 8,
            'name' => 'condensed milk',
        ]);
        
        DB::table('ingredients')->insert([
            'id' => 9,
            'name' => 'pineapple juice',
        ]);
    }
}
