<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // User must be logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // User must be an admin
        if (!auth()->user()->is_admin) {
            $user = auth()->user();
            $user->is_admin = true;
            $user->save();
        }

        return $next($request);
    }
}

?>