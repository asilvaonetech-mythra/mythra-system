<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class BrandService
{
    /**
     * Lista marcas.
     */
    public function all(): Collection
    {
        return Brand::query()
            ->latest()
            ->get();
    }

    /**
     * Cria uma marca.
     */
    public function create(array $data): Brand
    {
        $data['slug'] ??= Str::slug($data['name']);

        return Brand::create($data);
    }

    /**
     * Atualiza uma marca.
     */
    public function update(
        Brand $brand,
        array $data
    ): Brand {
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $brand->update($data);

        return $brand->refresh();
    }

    /**
     * Ativa ou desativa marca.
     */
    public function toggle(
        Brand $brand
    ): Brand {
        $brand->update([
            'is_active' => ! $brand->is_active,
        ]);

        return $brand->refresh();
    }

    /**
     * Remove marca.
     */
    public function delete(
        Brand $brand
    ): bool {
        return (bool) $brand->delete();
    }
}