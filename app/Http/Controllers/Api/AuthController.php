<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //Login function
    public function login(Request $request){
        $credentials = $request->only(['email',
        'password']);

        if(!$token=auth()->attempt($credentials)){

            return response()->json([
                'werktNiet' => false,
                'message' => 'invalid credentials'
            ]);
        }
        return response()->json([
            'werktWel' => true,
            'token' => $token,
            'user' => Auth::user() 
        ]);
    }

    //Register function
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
                'message' => ''.$e
            ]);
        }
    }

    //Logout function
    public function logout(Request $request){
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'werktWel' => true,
                'message' => 'Je bent uitgelogd'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'werktNiet' => false,
                'message' => ''.$e
            ]);
        }
    }
}
