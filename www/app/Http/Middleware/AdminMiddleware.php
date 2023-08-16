<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null): Response
    {
        $authGuard = Auth::guard($guard);
        if ($authGuard->guest()) {
            return redirect('login');
        }
        if (!$authGuard->user()->isAdmin()) {
            return redirect('login');
        }

        return $next($request);
    }
}
