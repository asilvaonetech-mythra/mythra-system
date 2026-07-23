<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;


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



Route::post('/login', [AuthController::class, 'login']);




Route::get('/register', function () {

    return view('auth.register');

})->name('register');



Route::post('/register', [AuthController::class, 'register']);



Route::post('/logout', [AuthController::class, 'logout']);








/*
|--------------------------------------------------------------------------
| Portal Mythra
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {



    /*
    |--------------------------------------------------------------------------
    | Estado Vivo do Portal
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



});