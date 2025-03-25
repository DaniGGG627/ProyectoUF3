<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y tiene el rol adecuado
        if (auth()->check() && auth()->user()->role !== $role) {
            // Si no tiene el rol, redirige a una página de error o lo que desees
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}
