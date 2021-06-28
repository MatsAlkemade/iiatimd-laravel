<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
