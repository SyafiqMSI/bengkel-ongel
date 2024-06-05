<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Atuh;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->isAdmin()) {
            // Redirect atau berikan respon sesuai kebutuhan
            return redirect()->route('home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman tersebut.');
        }
        return $next($request);
    }
}
