<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Communication;

class CommunicationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.communications.view');
    }

    public function view(
        User $user,
        Communication $communication
    ): bool {
        return $user->can('marketing.communications.view');
    }

    public function create(User $user): bool
    {
        return $user->can('marketing.communications.create');
    }

    public function update(
        User $user,
        Communication $communication
    ): bool {
        return $user->can('marketing.communications.update');
    }

    public function send(
        User $user,
        Communication $communication
    ): bool {
        return $user->can('marketing.communications.send');
    }

    public function delete(
        User $user,
        Communication $communication
    ): bool {
        return $user->can('marketing.communications.delete');
    }
}