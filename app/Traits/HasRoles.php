<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRoles
{
    /**
     * Roles do usuário.
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user'
        )
        ->withPivot([
            'is_primary',
            'assigned_at',
            'assigned_by',
        ])
        ->withTimestamps();
    }

    /**
     * Role principal.
     */
    public function primaryRole()
    {
        return $this->roles()
            ->wherePivot('is_primary', true)
            ->first();
    }

    /**
     * Adiciona uma role.
     */
    public function assignRole($role, bool $primary = false): void
    {
        if ($role instanceof Role) {
            $roleId = $role->id;
        } else {
            $roleId = Role::where('slug', $role)->value('id');
        }

        if (!$roleId) {
            return;
        }

        if ($primary) {
            $this->roles()->updateExistingPivot(
                $this->roles()->pluck('roles.id')->toArray(),
                ['is_primary' => false]
            );
        }

        $this->roles()->syncWithoutDetaching([
            $roleId => [
                'is_primary' => $primary,
                'assigned_at' => now(),
            ]
        ]);
    }

    /**
     * Remove uma role.
     */
    public function removeRole($role): void
    {
        if ($role instanceof Role) {
            $roleId = $role->id;
        } else {
            $roleId = Role::where('slug', $role)->value('id');
        }

        if ($roleId) {
            $this->roles()->detach($roleId);
        }
    }

    /**
     * Possui determinada role?
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()
            ->where('slug', $role)
            ->exists();
    }

    /**
     * Possui alguma das roles?
     */
    public function hasAnyRole(array $roles): bool
    {
        return $this->roles()
            ->whereIn('slug', $roles)
            ->exists();
    }

    /**
     * Possui todas as roles?
     */
    public function hasAllRoles(array $roles): bool
    {
        foreach ($roles as $role) {
            if (!$this->hasRole($role)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Possui determinada permissão?
     */
    public function canAccess(string $permission): bool
    {
        return $this->roles()
            ->whereHas('permissions', function ($query) use ($permission) {
                $query->where('slug', $permission)
                      ->wherePivot('allowed', true);
            })
            ->exists();
    }

    /**
     * Alias para compatibilidade.
     */
    public function hasPermission(string $permission): bool
    {
        return $this->canAccess($permission);
    }

    /**
     * Lista todas as permissões do usuário.
     */
    public function permissions()
    {
        return Permission::whereHas('roles.users', function ($query) {
            $query->where('users.id', $this->id);
        })->distinct();
    }

    /**
     * Sincroniza roles.
     */
    public function syncRoles(array $roles): void
    {
        $ids = Role::whereIn('slug', $roles)->pluck('id')->toArray();

        $this->roles()->sync($ids);
    }

    /**
     * Remove todas as roles.
     */
    public function clearRoles(): void
    {
        $this->roles()->detach();
    }
}