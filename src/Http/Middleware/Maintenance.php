<?php

namespace Anam\LaravelShield\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Maintenance
{
    public function handle(Request $request, Closure $next)
    {
        if (!Hash::check($request->getHost(), config('laravel-shield.project_domain'))) {
            abort(503);
        }
        return $next($request);
    }
}
