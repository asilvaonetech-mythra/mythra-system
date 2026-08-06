<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Publication;

class PublicationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.publications.view');
    }

    public function view(
        User $user,
        Publication $publication
    ): bool {
        return $user->can('marketing.publications.view');
    }

    public function create(User $user): bool
    {
        return $user->can('marketing.publications.create');
    }

    public function update(
        User $user,
        Publication $publication
    ): bool {
        return $user->can('marketing.publications.update');
    }

    public function delete(
        User $user,
        Publication $publication
    ): bool {
        return $user->can('marketing.publications.delete');
    }

    public function publish(
        User $user,
        Publication $publication
    ): bool {
        return $user->can('marketing.publications.publish');
    }
}