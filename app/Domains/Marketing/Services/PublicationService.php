<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Publication;
use Illuminate\Database\Eloquent\Collection;

class PublicationService
{
    /**
     * Lista publicações.
     */
    public function all(): Collection
    {
        return Publication::query()
            ->with([
                'campaign',
                'socialNetwork',
            ])
            ->latest()
            ->get();
    }

    /**
     * Cria publicação.
     */
    public function create(array $data): Publication
    {
        return Publication::create($data);
    }

    /**
     * Atualiza publicação.
     */
    public function update(
        Publication $publication,
        array $data
    ): Publication {
        $publication->update($data);

        return $publication->refresh();
    }

    /**
     * Publica conteúdo.
     */
    public function publish(
        Publication $publication
    ): Publication {
        $publication->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        return $publication->refresh();
    }

    /**
     * Remove publicação.
     */
    public function delete(
        Publication $publication
    ): bool {
        return (bool) $publication->delete();
    }
}