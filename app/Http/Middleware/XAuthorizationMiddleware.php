<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class XAuthorizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('X-Authorization');
        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = $accessToken->tokenable;
        Auth::login($user);

        return $next($request);
    }
}
