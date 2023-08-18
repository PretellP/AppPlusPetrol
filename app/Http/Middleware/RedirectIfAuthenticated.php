<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                switch(Auth::user()->userType->name)
                {
                    case 'ADMINISTRADOR':
                        $verifiedRoute = route('warehouses.index');
                        break;
                    case 'SOLICITANTE':
                        $verifiedRoute = route('guides.index');
                        break;
                    case 'APROBANTE':
                        $verifiedRoute = route('approvingGuides.index');
                        break;
                    default:
                        $verifiedRoute = route('login');
                }
   
                return redirect($verifiedRoute);
            }
        }

        return $next($request);
    }
}
