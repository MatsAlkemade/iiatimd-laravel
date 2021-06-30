<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientInCocktailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_in_cocktail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cocktail_id');
            $table->foreignId('ingredient_id');
            $table->timestamps();

            $table->foreign('cocktail_id')->references('id')->on('cocktails');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_in_cocktail');
    }
}
