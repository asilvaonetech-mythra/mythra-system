<?php

namespace App\Domains\Marketing\Services;

use App\Domains\Marketing\Models\SocialNetwork;
use Illuminate\Database\Eloquent\Collection;

class SocialNetworkService
{
    /**
     * Lista redes sociais.
     */
    public function all(): Collection
    {
        return SocialNetwork::query()
            ->latest()
            ->get();
    }

    /**
     * Cria rede social.
     */
    public function create(array $data): SocialNetwork
    {
        return SocialNetwork::create($data);
    }

    /**
     * Atualiza rede social.
     */
    public function update(
        SocialNetwork $socialNetwork,
        array $data
    ): SocialNetwork {
        $socialNetwork->update($data);

        return $socialNetwork->refresh();
    }

    /**
     * Ativa ou desativa rede social.
     */
    public function toggle(
        SocialNetwork $socialNetwork
    ): SocialNetwork {
        $socialNetwork->update([
            'is_active' => ! $socialNetwork->is_active,
        ]);

        return $socialNetwork->refresh();
    }

    /**
     * Remove rede social.
     */
    public function delete(
        SocialNetwork $socialNetwork
    ): bool {
        return (bool) $socialNetwork->delete();
    }
}