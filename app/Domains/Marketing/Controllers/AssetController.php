<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AssetController extends Controller
{
    public function store(
        Request $request,
        string $type
    ): RedirectResponse {

        // Upload será implementado na fase de serviços.

        return back()->with(
            'success',
            "Upload de {$type} realizado com sucesso."
        );
    }

    public function update(
        Request $request,
        int $asset
    ): RedirectResponse {

        return back()->with(
            'success',
            'Asset atualizado com sucesso.'
        );
    }

    public function destroy(
        int $asset
    ): RedirectResponse {

        return back()->with(
            'success',
            'Asset removido com sucesso.'
        );
    }
}