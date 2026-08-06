<?php

namespace App\Domains\Marketing\Policies;

use App\Models\User;
use App\Domains\Marketing\Models\Brand;

class BrandPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('marketing.brands.view');
    }

    public function view(
        User $user,
        Brand $brand
    ): bool {
        return $user->can('marketing.brands.view');
    }

    public function create(User $user): bool
    {
        return $user->can('marketing.brands.create');
    }

    public function update(
        User $user,
        Brand $brand
    ): bool {
        return $user->can('marketing.brands.update');
    }

    public function delete(
        User $user,
        Brand $brand
    ): bool {
        return $user->can('marketing.brands.delete');
    }
}