<?php

namespace Anam\LaravelShield\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShieldAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (!Hash::check($request->route()->parameter('shield_access_key'), config('laravel-shield.shield_access_key'))) {
            abort(404);
        }
        return $next($request);
    }
}
