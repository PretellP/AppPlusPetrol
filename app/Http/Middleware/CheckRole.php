<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
            if(!Auth::check())
            {
                return redirect()->route('login');
            }
            else{
                if(is_array($roles)){
                    foreach ($roles as $role) {
                        if (Auth::user()->role->name == $role) {
                            return $next($request);
                        }
                    }
                    abort(403, 'Acceso denegado'); 
                }                
            }
    }
}
