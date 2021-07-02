<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cocktail;
use Illuminate\Support\Facades\Auth;

class CocktailsController extends Controller
{
    public function create(Request $request){

        $cocktail = new Cocktail;
        $cocktail->title = $request->title;
        $cocktail->desc = $request->desc;
        $cocktail->calories = $request->calories;
        $cocktail->percentage = $request->percentage;

        if($request->photo != null){
            $photo = time().'jpg';
            file_put_contents('storage/cocktails/'.$photo,base64_decode($request->photo));
            $cocktail->photo = $photo; 
        }

        $cocktail->save();
        return response()->json([
            'success'=> true,
            'message' => 'Toegevoegd!',
            'cocktail' => $cocktail,
        ]);
    }

    public function update(Request $request){
        $cocktail = Cocktail::find($request->id);
        
    
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

    public function delete(Request $request){
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


   
