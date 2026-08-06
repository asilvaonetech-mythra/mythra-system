<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;

abstract class BaseMarketingController extends Controller
{
    /**
     * Domínio base do Marketing.
     */
    protected string $domain = 'marketing';
}
