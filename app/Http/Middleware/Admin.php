<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if ($request->user()->role !== 'admin') {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
