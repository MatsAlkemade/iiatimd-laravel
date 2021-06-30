<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CocktailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cocktails')->insert([
            'id' => 1,
            'title' => 'Mojito',
            'desc' => 'A very refreshing cocktail!',
            'percentage' => '15',
            'calories' => '240',
        ]);

        DB::table('cocktails')->insert([
            'id' => 2,
            'title' => 'Pina Colada',
            'desc' => 'A tropical cocktail',
            'percentage' => '15',
            'calories' => '338',
        ]);
    }
}
