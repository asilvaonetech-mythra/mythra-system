<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Domains\Marketing\Models\Campaign;
use App\Domains\Marketing\Models\Content;
use App\Domains\Marketing\Models\Publication;
use App\Domains\Marketing\Models\Brand;
use App\Domains\Marketing\Models\Automation;
use App\Domains\Marketing\Models\Communication;

use App\Domains\Marketing\Policies\CampaignPolicy;
use App\Domains\Marketing\Policies\ContentPolicy;
use App\Domains\Marketing\Policies\PublicationPolicy;
use App\Domains\Marketing\Policies\BrandPolicy;
use App\Domains\Marketing\Policies\AutomationPolicy;
use App\Domains\Marketing\Policies\CommunicationPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Mapeamento das Policies do sistema.
     *
     * Cada domínio registra suas próprias regras
     * de autorização.
     */
    protected $policies = [

        /*
        |--------------------------------------------------------------------------
        | Mythra Marketing
        |--------------------------------------------------------------------------
        */

        Campaign::class =>
            CampaignPolicy::class,

        Content::class =>
            ContentPolicy::class,

        Publication::class =>
            PublicationPolicy::class,

        Brand::class =>
            BrandPolicy::class,

        Automation::class =>
            AutomationPolicy::class,

        Communication::class =>
            CommunicationPolicy::class,

    ];


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}