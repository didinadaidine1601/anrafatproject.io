<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTEException;


use Closure;
use Illuminate\Http\Request;

class JWTMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         $message="";

        try {
            JWTAuth::parrseToken()->authentificate();
            return $next($request);
            
        } catch (TokenExpiredException $e) {
             $message="token expired";

        } catch (TokenInvalidException $e) {
              $message="token invalid";

        }
        catch (JWTEException $e) {
             $message="provide token";

        }

        return response()->json([
            "success"=>false,
            "message"=>$message,
        ]);
    }
}
