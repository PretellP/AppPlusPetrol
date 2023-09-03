<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckValidUser
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && (Auth::user()->status == 0)){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Acceso no autorizado: Tu cuenta ha sido suspendida.');

        }

        return $next($request);
    }
}
