<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\ImageAsset;
use App\Domains\Marketing\Models\VideoAsset;
use App\Domains\Marketing\Models\AudioAsset;
use App\Domains\Marketing\Services\AssetService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AssetController extends Controller
{
    public function __construct(
        protected AssetService $assetService
    ) {
    }


    /**
     * Biblioteca de Mídia Mythra.
     */
    public function index(): View
    {
        $imageAssets = ImageAsset::latest()->get();

        $videoAssets = VideoAsset::latest()->get();

        $audioAssets = AudioAsset::latest()->get();


        return view(
            'mythra.marketing.assets.index',
            compact(
                'imageAssets',
                'videoAssets',
                'audioAssets'
            )
        );
    }


    /**
     * Formulário de criação.
     */
    public function create(): View
    {
        return view(
            'mythra.marketing.assets.create'
        );
    }


    /**
     * Salvar mídia.
     */
    public function store(
        Request $request,
        string $type
    ): RedirectResponse {

        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'category' => [
                'nullable',
                'string',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);


        $data['file_path'] = 'pending';


        $this->assetService->create(
            $type,
            $data
        );


        return redirect()
            ->route('marketing.assets.index')
            ->with(
                'success',
                'Mídia cadastrada com sucesso.'
            );
    }


    /**
     * Visualizar mídia.
     */
    public function show(
        string $type,
        int $id
    ): View {

        $asset = $this->findAsset(
            $type,
            $id
        );


        return view(
            'mythra.marketing.assets.show',
            compact(
                'asset',
                'type'
            )
        );
    }


    /**
     * Editar mídia.
     */
    public function edit(
        string $type,
        int $id
    ): View {

        $asset = $this->findAsset(
            $type,
            $id
        );


        return view(
            'mythra.marketing.assets.edit',
            compact(
                'asset',
                'type'
            )
        );
    }


    /**
     * Atualizar mídia.
     */
    public function update(
        Request $request,
        string $type,
        int $id
    ): RedirectResponse {

        $asset = $this->findAsset(
            $type,
            $id
        );


        $asset->update(
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:150',
                ],

                'category' => [
                    'nullable',
                    'string',
                ],

                'description' => [
                    'nullable',
                    'string',
                ],
            ])
        );


        return redirect()
            ->route('marketing.assets.index')
            ->with(
                'success',
                'Mídia atualizada com sucesso.'
            );
    }


    /**
     * Excluir mídia.
     */
    public function destroy(
        string $type,
        int $id
    ): RedirectResponse {

        $asset = $this->findAsset(
            $type,
            $id
        );


        $asset->delete();


        return redirect()
            ->route('marketing.assets.index')
            ->with(
                'success',
                'Mídia removida com sucesso.'
            );
    }


    /**
     * Localizar asset pelo tipo.
     */
    protected function findAsset(
        string $type,
        int $id
    ) {

        return match ($type) {

            'image' => ImageAsset::findOrFail($id),

            'video' => VideoAsset::findOrFail($id),

            'audio' => AudioAsset::findOrFail($id),

            default => abort(404),
        };
    }
}