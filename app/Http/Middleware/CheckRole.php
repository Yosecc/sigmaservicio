<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Allow the request only when the authenticated user has one of the
     * supplied roles.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->hasAnyRole($roles)) {
            abort(403, 'No tiene permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
