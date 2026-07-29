<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\SettingService;
use App\Services\AuditService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    
    $this->app->register(
        \App\Providers\MythraTalentServiceProvider::class
    );
}

        /*
        |--------------------------------------------------------------------------
        | Serviços Globais Mythra
        |--------------------------------------------------------------------------
        */

        $this->app->singleton(
            SettingService::class,
            function () {

                return new SettingService();

            }
        );


        $this->app->singleton(
            AuditService::class,
            function () {

                return new AuditService();

            }
        );

    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //
    }
}