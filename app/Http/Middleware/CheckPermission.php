<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * Uso:
     * ->middleware('permission:users.view')
     * ->middleware('permission:users.create')
     * ->middleware('permission:roles.manage')
     */
    public function handle(
        Request $request,
        Closure $next,
        string $permission
    ): Response {

        if (!auth()->check()) {
            abort(401);
        }

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Super Administrador
        |--------------------------------------------------------------------------
        */
        if ($user->hasRole('super-admin')) {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Permissão
        |--------------------------------------------------------------------------
        */
        if (!$user->canAccess($permission)) {
            abort(403, 'Você não possui permissão para acessar este recurso.');
        }

        return $next($request);
    }
}