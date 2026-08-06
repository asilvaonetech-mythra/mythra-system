<?php

namespace App\Domains\Marketing\Services;

use Illuminate\Database\Eloquent\Model;

class AssetService
{
    /**
     * Cria um asset.
     */
    public function create(
        Model $model,
        array $data
    ): Model {
        return $model::create($data);
    }

    /**
     * Atualiza um asset.
     */
    public function update(
        Model $asset,
        array $data
    ): Model {
        $asset->update($data);

        return $asset->refresh();
    }

    /**
     * Remove um asset.
     */
    public function delete(
        Model $asset
    ): bool {
        return (bool) $asset->delete();
    }

    /**
     * Busca por categoria.
     */
    public function byCategory(
        Model $model,
        string $category
    ) {
        return $model::query()
            ->where('category', $category)
            ->latest()
            ->get();
    }
}