<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\CoreController;


/*
|--------------------------------------------------------------------------
| Core Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Core\UserController;
use App\Http\Controllers\Core\RoleController;
use App\Http\Controllers\Core\PermissionController;
use App\Http\Controllers\Core\UserRoleController;
use App\Http\Controllers\Core\SettingController;


/*
|--------------------------------------------------------------------------
| Talent Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Talent\TalentController;
use App\Http\Controllers\Talent\TalentProfileController;
use App\Http\Controllers\Talent\TalentSkillController;
use App\Http\Controllers\Talent\TalentEvolutionController;
use App\Http\Controllers\Talent\TalentApplicationController;
use App\Http\Controllers\Talent\OpportunityController;
use App\Http\Controllers\Talent\OrganizationController;
use App\Http\Controllers\Talent\ResumeController;
use App\Http\Controllers\Talent\SelectionProcessController;
use App\Http\Controllers\Talent\SkillController;


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
    )->name('portal.state');



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
    )->name('portal');



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
    )->name('core.index');


    Route::get(
        '/portal/core/{section}',
        [
            CoreController::class,
            'show'
        ]
    )->name('core.section');



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
    )->name('modules.index');


    Route::get(
        '/portal/module/search',
        [
            ModuleController::class,
            'search'
        ]
    )->name('modules.search');


    Route::get(
        '/portal/module/api',
        [
            ModuleController::class,
            'api'
        ]
    )->name('modules.api');


    Route::get(
        '/portal/{module}',
        [
            ModuleController::class,
            'show'
        ]
    )->name('modules.show');



    /*
    |--------------------------------------------------------------------------
    | MYTHRA TALENT
    |--------------------------------------------------------------------------
    */

    Route::prefix('talent')
        ->name('talent.')
        ->group(function () {


            /*
            |--------------------------------------------------------------------------
            | Entrada Talent
            |--------------------------------------------------------------------------
            */

            Route::get(
                '/',
                [
                    TalentController::class,
                    'index'
                ]
            )->name('index');


            Route::get(
                '/search',
                [
                    TalentController::class,
                    'search'
                ]
            )->name('search');



            /*
            |--------------------------------------------------------------------------
            | Perfis de Talentos
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'profiles',
                TalentProfileController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Competências
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'skills',
                SkillController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Competências dos Talentos
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'talent-skills',
                TalentSkillController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Evolução dos Talentos
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'evolutions',
                TalentEvolutionController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Organizações
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'organizations',
                OrganizationController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Oportunidades
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'opportunities',
                OpportunityController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Processos Seletivos
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'selection',
                SelectionProcessController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Currículos
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'resumes',
                ResumeController::class
            );



            /*
            |--------------------------------------------------------------------------
            | Conexões Talento x Oportunidade
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'applications',
                TalentApplicationController::class
            );


        });



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
            | Usuários
            |--------------------------------------------------------------------------
            */

            Route::middleware('permission:users.manage')
                ->group(function () {

                    Route::resource(
                        'users',
                        UserController::class
                    );

                });



            /*
            |--------------------------------------------------------------------------
            | Roles
            |--------------------------------------------------------------------------
            */

            Route::middleware('permission:roles.manage')
                ->group(function () {

                    Route::resource(
                        'roles',
                        RoleController::class
                    );

                });



            /*
            |--------------------------------------------------------------------------
            | Permissions
            |--------------------------------------------------------------------------
            */

            Route::middleware('permission:permissions.manage')
                ->group(function () {

                    Route::resource(
                        'permissions',
                        PermissionController::class
                    );

                });



            /*
            |--------------------------------------------------------------------------
            | Usuários x Roles
            |--------------------------------------------------------------------------
            */

            Route::middleware('permission:users.roles')
                ->group(function () {


                    Route::get(
                        'user-roles',
                        [
                            UserRoleController::class,
                            'index'
                        ]
                    )->name('user-roles.index');


                    Route::get(
                        'user-roles/{user}/edit',
                        [
                            UserRoleController::class,
                            'edit'
                        ]
                    )->name('user-roles.edit');


                    Route::put(
                        'user-roles/{user}',
                        [
                            UserRoleController::class,
                            'update'
                        ]
                    )->name('user-roles.update');


                    Route::post(
                        'user-roles/{user}/attach',
                        [
                            UserRoleController::class,
                            'attach'
                        ]
                    )->name('user-roles.attach');


                    Route::delete(
                        'user-roles/{user}/{role}',
                        [
                            UserRoleController::class,
                            'detach'
                        ]
                    )->name('user-roles.detach');


                });



            /*
            |--------------------------------------------------------------------------
            | Configurações Globais
            |--------------------------------------------------------------------------
            */

            Route::middleware('permission:core.settings')
                ->group(function () {

                    Route::resource(
                        'settings',
                        SettingController::class
                    );

                });


        });


});