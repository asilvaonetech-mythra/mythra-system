<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class PermissionService
{
    /**
     * Verifica se um usuário possui uma permissão.
     */
    public function hasPermission(User $user, string $permission): bool
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return $user->roles()
            ->whereHas('permissions', function ($query) use ($permission) {
                $query->where('slug', $permission)
                    ->wherePivot('allowed', true);
            })
            ->exists();
    }

    /**
     * Verifica se possui uma Role.
     */
    public function hasRole(User $user, string $role): bool
    {
        return $user->roles()
            ->where('slug', $role)
            ->exists();
    }

    /**
     * Atribui uma Role.
     */
    public function assignRole(User $user, string|Role $role, bool $primary = false): void
    {
        $user->assignRole($role, $primary);
    }

    /**
     * Remove uma Role.
     */
    public function removeRole(User $user, string|Role $role): void
    {
        $user->removeRole($role);
    }

    /**
     * Concede uma permissão a uma Role.
     */
    public function givePermission(Role $role, string|Permission $permission): void
    {
        $role->givePermission($permission);
    }

    /**
     * Revoga uma permissão de uma Role.
     */
    public function revokePermission(Role $role, string|Permission $permission): void
    {
        $role->revokePermission($permission);
    }

    /**
     * Lista as permissões de uma Role.
     */
    public function rolePermissions(Role $role)
    {
        return $role->permissions()
            ->orderBy('module')
            ->orderBy('display_name')
            ->get();
    }

    /**
     * Lista as Roles de um usuário.
     */
    public function userRoles(User $user)
    {
        return $user->roles()
            ->orderBy('display_name')
            ->get();
    }

    /**
     * Todas as permissões disponíveis.
     */
    public function allPermissions()
    {
        return Permission::active()
            ->orderBy('module')
            ->orderBy('display_name')
            ->get()
            ->groupBy('module');
    }

    /**
     * Todas as Roles disponíveis.
     */
    public function allRoles()
    {
        return Role::active()
            ->orderBy('display_name')
            ->get();
    }
}