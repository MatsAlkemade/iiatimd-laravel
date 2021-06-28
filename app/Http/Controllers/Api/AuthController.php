<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only(['email',
        'password']);


        if(!$token=auth()->attempt($credentials)){

            return response()->json([
                'werktNiet' => false,
            ]);
        }
        return response()->json([
            'werktWel' => true,
            'token' => $token,
            'user' => Auth::user() 
        ]);
    }

    public function register(Request $request){

        $encryptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();

            return $this->login($request);
        
        }
        catch(Exception $e){
            return response()->json([
                'werktNiet' => false,
                'message' => $e
            ]);
        }
    }
}
