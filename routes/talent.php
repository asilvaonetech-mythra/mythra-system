<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TalentController;
use App\Http\Controllers\TalentProfileController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\SelectionProcessController;
use App\Http\Controllers\TalentApplicationController;
use App\Http\Controllers\TalentEvolutionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TalentSkillController;


/*
|--------------------------------------------------------------------------
| Mythra Talent Routes
|--------------------------------------------------------------------------
|
| Camada de pessoas, talentos e organizações.
| Integrada ao Core Mythra.
|
*/


Route::middleware([
    'auth',
])
->prefix('talent')
->name('talent.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Entrada do Domínio Talent
    |--------------------------------------------------------------------------
    */

    Route::get('/', [
        TalentController::class,
        'index'
    ])
    ->name('index');


    Route::get('/search', [
        TalentController::class,
        'search'
    ])
    ->name('search');


    Route::get('/talent/{talentProfile}', [
        TalentController::class,
        'show'
    ])
    ->name('show');



    /*
    |--------------------------------------------------------------------------
    | Perfis
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'profiles',
        TalentProfileController::class
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
    | Conexões Talento/Oportunidade
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'applications',
        TalentApplicationController::class
    )
    ->except([
        'edit',
        'create'
    ]);



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
    | Currículos
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'resumes',
        ResumeController::class
    );



    /*
    |--------------------------------------------------------------------------
    | Competências dos talentos
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'talent-skills',
        TalentSkillController::class
    )
    ->except([
        'show',
        'edit'
    ]);



    /*
    |--------------------------------------------------------------------------
    | Evolução
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'evolutions',
        TalentEvolutionController::class
    );

});