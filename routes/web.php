<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\CoreController;

use App\Http\Controllers\Core\RoleController;
use App\Http\Controllers\Core\PermissionController;
use App\Http\Controllers\Core\UserRoleController;


/*
|--------------------------------------------------------------------------
| Página Inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});



/*
|--------------------------------------------------------------------------
| Autenticação Mythra
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('auth.login');

})->name('login');


Route::post(
    '/login',
    [
        AuthController::class,
        'login'
    ]
);



Route::get('/register', function () {

    return view('auth.register');

})->name('register');


Route::post(
    '/register',
    [
        AuthController::class,
        'register'
    ]
);



Route::post(
    '/logout',
    [
        AuthController::class,
        'logout'
    ]
);



/*
|--------------------------------------------------------------------------
| Portal Mythra
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {



    /*
    |--------------------------------------------------------------------------
    | Estado Vivo Portal
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/portal/state',
        [
            PortalController::class,
            'state'
        ]
    )
    ->name('portal.state');




    /*
    |--------------------------------------------------------------------------
    | Entrada Portal
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/portal',
        [
            PortalController::class,
            'index'
        ]
    )
    ->name('portal');




    /*
    |--------------------------------------------------------------------------
    | Mythra Core
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/portal/core',
        [
            CoreController::class,
            'index'
        ]
    )
    ->name('core.index');


    Route::get(
        '/portal/core/{section}',
        [
            CoreController::class,
            'show'
        ]
    )
    ->name('core.section');





    /*
    |--------------------------------------------------------------------------
    | Módulos Mythra
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/portal/modules',
        [
            ModuleController::class,
            'index'
        ]
    )
    ->name('modules.index');



    Route::get(
        '/portal/module/search',
        [
            ModuleController::class,
            'search'
        ]
    )
    ->name('modules.search');



    Route::get(
        '/portal/module/api',
        [
            ModuleController::class,
            'api'
        ]
    )
    ->name('modules.api');



    Route::get(
        '/portal/{module}',
        [
            ModuleController::class,
            'show'
        ]
    )
    ->name('modules.show');





    /*
    |--------------------------------------------------------------------------
    | CORE RBAC
    |--------------------------------------------------------------------------
    */


    Route::prefix('core')
        ->name('core.')
        ->group(function () {



            /*
            |--------------------------------------------------------------------------
            | Roles
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'roles',
                RoleController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Permissions
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'permissions',
                PermissionController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Usuários x Roles
            |--------------------------------------------------------------------------
            */

            Route::get(
                'user-roles',
                [
                    UserRoleController::class,
                    'index'
                ]
            )
            ->name('user-roles.index');



            Route::get(
                'user-roles/{user}/edit',
                [
                    UserRoleController::class,
                    'edit'
                ]
            )
            ->name('user-roles.edit');



            Route::put(
                'user-roles/{user}',
                [
                    UserRoleController::class,
                    'update'
                ]
            )
            ->name('user-roles.update');



            Route::post(
                'user-roles/{user}/attach',
                [
                    UserRoleController::class,
                    'attach'
                ]
            )
            ->name('user-roles.attach');



            Route::delete(
                'user-roles/{user}/{role}',
                [
                    UserRoleController::class,
                    'detach'
                ]
            )
            ->name('user-roles.detach');

        });

});
