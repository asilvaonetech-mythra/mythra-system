<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Policies da aplicação.
     */
    protected $policies = [

        User::class => UserPolicy::class,

    ];


    /**
     * Inicialização dos Gates.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        /*
        |--------------------------------------------------------------------------
        | Usuários
        |--------------------------------------------------------------------------
        */


        Gate::define(
            'users.view',
            function (User $user) {

                return $user->hasPermission(
                    'users.view'
                );

            }
        );


        Gate::define(
            'users.create',
            function (User $user) {

                return $user->hasPermission(
                    'users.create'
                );

            }
        );


        Gate::define(
            'users.edit',
            function (User $user) {

                return $user->hasPermission(
                    'users.edit'
                );

            }
        );


        Gate::define(
            'users.delete',
            function (User $user) {

                return $user->hasPermission(
                    'users.delete'
                );

            }
        );


        Gate::define(
            'users.restore',
            function (User $user) {

                return $user->hasPermission(
                    'users.restore'
                );

            }
        );

    }
}