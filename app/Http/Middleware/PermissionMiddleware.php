<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PermissionMiddleware
{


    /**
     * Verifica permissão do usuário.
     */
    public function handle(
        Request $request,
        Closure $next,
        string $permission
    ): Response
    {


        $user = $request->user();



        /*
        |--------------------------------------------------------------------------
        | Usuário não autenticado
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            abort(401);

        }





        /*
        |--------------------------------------------------------------------------
        | Super Admin possui acesso total
        |--------------------------------------------------------------------------
        */

        if ($user->hasRole('super-admin')) {

            return $next($request);

        }





        /*
        |--------------------------------------------------------------------------
        | Verifica permissão
        |--------------------------------------------------------------------------
        */

        if (!$user->hasPermission($permission)) {


            abort(
                403,
                'Você não possui permissão para acessar este recurso.'
            );


        }





        return $next($request);

    }


}