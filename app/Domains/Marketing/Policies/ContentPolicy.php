<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Content;

class ContentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.contents.view');
    }

    public function view(
        User $user,
        Content $content
    ): bool {
        return $user->can('marketing.contents.view');
    }

    public function create(User $user): bool
    {
        return $user->can('marketing.contents.create');
    }

    public function update(
        User $user,
        Content $content
    ): bool {
        return $user->can('marketing.contents.update');
    }

    public function delete(
        User $user,
        Content $content
    ): bool {
        return $user->can('marketing.contents.delete');
    }
}