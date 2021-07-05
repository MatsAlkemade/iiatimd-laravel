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
        $photo = '';
        //check if user provided photo
        if($request->photo!=''){
            // // user time for photo name to prevent name duplication
            // $photo = time().'.jpg';
            // // decode photo string and save to storage/profiles
            // file_put_contents('storage/images/'.$photo,base64_decode($request->photo));

            $photo = 'data:image/jpeg;base64,' + $request->photo;
            $cocktail->photo = $photo;
        }
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
        try {
            $cocktail->delete();
            return response()->json([
                'success' => true,
                'message'=> 'Deleted!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }

    }

    // what is in the db
    public function cocktails(){
        $cocktails = Cocktail::orderBy('title', 'asc')->get();
        return response()->json([
            'cocktails' => $cocktails
        ]);
    }
}


   
