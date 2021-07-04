<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cocktail;
use Illuminate\Support\Facades\Auth;

class CocktailsController extends Controller
{
    public function store(Request $request){
        $cocktail = new Cocktail;

        try {
        $cocktail->title = $request->title;
        $cocktail->desc = $request->desc;
        $cocktail->calories = $request->calories;
        $cocktail->percentage = $request->percentage;
        $cocktail->photo = $request->photo;

        $cocktail->save();
        return response()->json([
            'success'=> true,
            'message' => 'Toegevoegd!',
            'cocktail' => $cocktail,
        ]);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    public function update(Request $request){
        $cocktail = Cocktail::find($request->id);
        
        try {
            $cocktail->desc = $request->desc;
            $cocktail->title = $request->title;
            $cocktail->calories = $request->calories;
            $cocktail->percentage = $request->percentage;
            $cocktail->update();
            return response()->json([
                'success' => true,
                'message'=> 'Geplaatst!'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    public function destroy(Request $request){
        $cocktail = Cocktail::find($request->id);
        
    
        $cocktail->desc = $request->desc;
        $cocktail->title = $request->title;
        $cocktail->calories = $request->calories;
        $cocktail->percentage = $request->percentage;

        if($cocktail->photo != ''){
            Storage::delete('public/cocktails/' .$cocktail->photo);
        }
        $cocktail->delete();
        return response()->json([
            'success' => true,
            'message'=> 'Geplaatst!'
        ]);
    }

    // what is in the db
    public function cocktails(){
        $cocktails = Cocktail::orderBy('title', 'asc')->get();
        return response()->json([
            'cocktails' => $cocktails
        ]);
    }
}


   
