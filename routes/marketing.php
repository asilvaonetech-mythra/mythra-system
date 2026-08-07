<?php

use Illuminate\Support\Facades\Route;

use App\Domains\Marketing\Controllers\CampaignController;
use App\Domains\Marketing\Controllers\SocialNetworkController;
use App\Domains\Marketing\Controllers\PublicationController;
use App\Domains\Marketing\Controllers\ContentController;
use App\Domains\Marketing\Controllers\AssetController;
use App\Domains\Marketing\Controllers\BrandController;
use App\Domains\Marketing\Controllers\CommunicationController;
use App\Domains\Marketing\Controllers\MetricController;
use App\Domains\Marketing\Controllers\AutomationController;
use App\Domains\Marketing\Controllers\MarketingAssistantController;


Route::middleware([
    'auth',
])
->prefix('marketing')
->name('marketing.')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Campaigns
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'campaigns',
        CampaignController::class
    );



    /*
    |--------------------------------------------------------------------------
    | Social Networks
    |--------------------------------------------------------------------------
    */

    Route::resource(
    'social-networks',
    SocialNetworkController::class
);


    Route::patch(
        'social-networks/{social_network}/toggle',
        [SocialNetworkController::class, 'toggle']
    )->name('social-networks.toggle');



    /*
    |--------------------------------------------------------------------------
    | Publications
    |--------------------------------------------------------------------------
    */

    Route::resource(
    'publications',
    PublicationController::class
);


    Route::patch(
        'publications/{publication}/publish',
        [PublicationController::class, 'publish']
    )->name('publications.publish');



    /*
    |--------------------------------------------------------------------------
    | Contents
    |--------------------------------------------------------------------------
    */

    Route::resource(
    'contents',
    ContentController::class
);


    Route::patch(
        'contents/{content}/publish',
        [ContentController::class, 'publish']
    )->name('contents.publish');



/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
*/

Route::get(
    'assets',
    [AssetController::class, 'index']
)->name('assets.index');


Route::get(
    'assets/create',
    [AssetController::class, 'create']
)->name('assets.create');


Route::post(
    'assets/{type}',
    [AssetController::class, 'store']
)->name('assets.store');


Route::get(
    'assets/{type}/{id}',
    [AssetController::class, 'show']
)->name('assets.show');


Route::get(
    'assets/{type}/{id}/edit',
    [AssetController::class, 'edit']
)->name('assets.edit');


Route::put(
    'assets/{type}/{id}',
    [AssetController::class, 'update']
)->name('assets.update');


Route::delete(
    'assets/{type}/{id}',
    [AssetController::class, 'destroy']
)->name('assets.destroy');



    /*
    |--------------------------------------------------------------------------
    | Brand
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'brands',
        BrandController::class
    );


    Route::patch(
        'brands/{brand}/toggle',
        [BrandController::class, 'toggle']
    )->name('brands.toggle');



    /*
    |--------------------------------------------------------------------------
    | Communications
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'communications',
        CommunicationController::class
    );


    Route::patch(
        'communications/{communication}/send',
        [CommunicationController::class, 'send']
    )->name('communications.send');



    /*
    |--------------------------------------------------------------------------
    | Metrics
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'metrics',
        MetricController::class
    );



    /*
    |--------------------------------------------------------------------------
    | Automations
    |--------------------------------------------------------------------------
    */

    Route::apiResource(
        'automations',
        AutomationController::class
    );


    Route::patch(
        'automations/{automation}/execute',
        [AutomationController::class, 'execute']
    )->name('automations.execute');


    Route::patch(
        'automations/{automation}/toggle',
        [AutomationController::class, 'toggle']
    )->name('automations.toggle');


});

Route::get(
    '/assistant',
    [
        MarketingAssistantController::class,
        'index'
    ]
)
->name(
    'marketing.assistant'
);