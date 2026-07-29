<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MythraTalentServiceProvider extends ServiceProvider
{
    /**
     * Registrar serviços do domínio Mythra Talent.
     */
    public function register(): void
    {
        //
    }


    /**
     * Inicializar serviços do domínio Mythra Talent.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(
            resource_path('views/mythra/talent'),
            'talent'
        );


        $this->loadMigrationsFrom(
            database_path('migrations')
        );
    }
}