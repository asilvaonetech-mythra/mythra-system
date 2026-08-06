<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Campaign;

class CampaignPolicy
{
    /**
     * Visualizar campanhas.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.campaigns.view');
    }

    /**
     * Visualizar campanha.
     */
    public function view(
        User $user,
        Campaign $campaign
    ): bool {
        return $user->can('marketing.campaigns.view');
    }

    /**
     * Criar campanha.
     */
    public function create(User $user): bool
    {
        return $user->can('marketing.campaigns.create');
    }

    /**
     * Atualizar campanha.
     */
    public function update(
        User $user,
        Campaign $campaign
    ): bool {
        return $user->can('marketing.campaigns.update');
    }

    /**
     * Excluir campanha.
     */
    public function delete(
        User $user,
        Campaign $campaign
    ): bool {
        return $user->can('marketing.campaigns.delete');
    }
}