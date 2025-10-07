<?php

namespace App\Http\Middleware;

/* to so me preparando pra sair se quise fechar ai */

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->isAdm()) {
            return $next ($request);
        }
        else {
            return redirect()->route('Home');
        }
        
    }
}