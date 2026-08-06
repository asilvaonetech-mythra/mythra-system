<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\Campaign;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class CampaignService
{
    /**
     * Lista campanhas.
     */
    public function all(): Collection
    {
        return Campaign::query()
            ->latest()
            ->get();
    }

    /**
     * Cria uma campanha.
     */
    public function create(array $data): Campaign
    {
        $data['slug'] ??= Str::slug($data['name']);

        return Campaign::create($data);
    }

    /**
     * Atualiza uma campanha.
     */
    public function update(
        Campaign $campaign,
        array $data
    ): Campaign {
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $campaign->update($data);

        return $campaign->refresh();
    }

    /**
     * Remove uma campanha.
     */
    public function delete(Campaign $campaign): bool
    {
        return (bool) $campaign->delete();
    }

    /**
     * Altera status.
     */
    public function changeStatus(
        Campaign $campaign,
        string $status
    ): Campaign {
        $campaign->update([
            'status' => $status,
        ]);

        return $campaign->refresh();
    }
}