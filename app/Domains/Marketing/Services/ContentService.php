<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Content;
use Illuminate\Database\Eloquent\Collection;

class ContentService
{
    /**
     * Lista conteúdos.
     */
    public function all(): Collection
    {
        return Content::query()
            ->with([
                'campaign',
                'images',
                'videos',
                'audios',
            ])
            ->latest()
            ->get();
    }

    /**
     * Cria conteúdo.
     */
    public function create(array $data): Content
    {
        return Content::create($data);
    }

    /**
     * Atualiza conteúdo.
     */
    public function update(
        Content $content,
        array $data
    ): Content {
        $content->update($data);

        return $content->refresh();
    }

    /**
     * Publica conteúdo.
     */
    public function publish(
        Content $content
    ): Content {
        $content->update([
            'status' => 'published',
        ]);

        return $content->refresh();
    }

    /**
     * Remove conteúdo.
     */
    public function delete(
        Content $content
    ): bool {
        return (bool) $content->delete();
    }
}