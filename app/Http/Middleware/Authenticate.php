<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::guard($guards)->guest()) {
            // For APIs: Return JSON error
            if ($request->is('api/*')) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            // For Web: Redirect to login
            return redirect()->guest(route('login'));
        }

        return $next($request);
    }
}