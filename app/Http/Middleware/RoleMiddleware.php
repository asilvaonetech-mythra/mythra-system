<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Verifica role do usuário.
     */
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {

        if (!auth()->check()) {

            abort(401);

        }


        if (!auth()->user()->hasRole($role)) {

            abort(403);

        }


        return $next($request);

    }
}