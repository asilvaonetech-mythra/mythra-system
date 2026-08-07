<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\ImageAsset;
use App\Domains\Marketing\Models\VideoAsset;
use App\Domains\Marketing\Models\AudioAsset;

class AssetService
{
    /**
     * Cria um asset conforme o tipo informado.
     */
    public function create(
        string $type,
        array $data
    ) {

        return match ($type) {

            'image' => ImageAsset::create($data),

            'video' => VideoAsset::create($data),

            'audio' => AudioAsset::create($data),

            default => throw new \Exception(
                'Tipo de asset inválido.'
            ),
        };
    }
}