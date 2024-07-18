<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role->name != 'Gerente de tienda'){
            return redirect()->route('show_rides')->with('error','Opción no disponible!');
        }
        return $next($request);
    }
}
