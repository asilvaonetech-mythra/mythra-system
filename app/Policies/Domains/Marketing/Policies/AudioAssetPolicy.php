<?php

namespace App\Policies\Domains\Marketing\Policies;

use App\Models\Domains\Marketing\Models\AudioAsset;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AudioAssetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AudioAsset $audioAsset): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AudioAsset $audioAsset): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AudioAsset $audioAsset): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AudioAsset $audioAsset): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AudioAsset $audioAsset): bool
    {
        return false;
    }
}
