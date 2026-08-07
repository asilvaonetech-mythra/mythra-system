<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Agents\ElaraAgent;
use Illuminate\View\View;

class MarketingAssistantController extends Controller
{
    public function index(
        ElaraAgent $elara
    ): View {

        $data = $elara->response();


        return view(
            'mythra.marketing.assistant.index',
            compact('data')
        );
    }
}