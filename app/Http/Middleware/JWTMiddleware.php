<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $message = '';

        try {
            //checks token validation
            JWTAuth::parseToken()->authenticate();
            return $next($request);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            //token is expired
            $message = 'token expired';
        }  catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            //token is invalid
            $message = 'token invalid';
        }  catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            //token is expired
            $message = 'provide token';
        }

        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }
}
