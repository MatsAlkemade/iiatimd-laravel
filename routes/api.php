<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//user
Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::get('/logout','Api\AuthController@logout');

//cocktail 
Route::middleware(['jwtAuth'])->group(function(){
    Route::post('/cocktails/create', 'Api\CocktailsController@create');
    Route::post('/cocktails/delete', 'Api\CocktailsController@delete');
    Route::post('/cocktails/update', 'Api\CocktailsController@update');
    Route::post('/ingredients/create', 'Api\IngredientsController@create');
    Route::post('/ingredients/delete', 'Api\IngredientsController@delete');
});

Route::get('/cocktails', 'Api\CocktailsController@cocktails');
