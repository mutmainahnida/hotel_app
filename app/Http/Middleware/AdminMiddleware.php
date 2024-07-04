<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
        // Periksa apakah pengguna memiliki peran "admin"
        if ($request->user() && $request->user()->hasRole('admin')) {
            return $next($request);
        }

        // Jika tidak, kembalikan response error
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
