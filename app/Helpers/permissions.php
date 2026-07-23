<?php

use App\Models\Role;
use App\Models\Permission;

if (!function_exists('user')) {
    /**
     * Usuário autenticado.
     */
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('hasRole')) {
    /**
     * Verifica se o usuário possui uma Role.
     */
    function hasRole(string $role): bool
    {
        if (!auth()->check()) {
            return false;
        }

        return auth()->user()->hasRole($role);
    }
}

if (!function_exists('hasAnyRole')) {
    /**
     * Verifica se possui qualquer Role.
     */
    function hasAnyRole(array $roles): bool
    {
        if (!auth()->check()) {
            return false;
        }

        return auth()->user()->hasAnyRole($roles);
    }
}

if (!function_exists('hasPermission')) {
    /**
     * Verifica se possui uma permissão.
     */
    function hasPermission(string $permission): bool
    {
        if (!auth()->check()) {
            return false;
        }

        return auth()->user()->canAccess($permission);
    }
}

if (!function_exists('canAccess')) {
    /**
     * Alias para permissões.
     */
    function canAccess(string $permission): bool
    {
        return hasPermission($permission);
    }
}

if (!function_exists('role')) {
    /**
     * Retorna uma Role pelo slug.
     */
    function role(string $slug): ?Role
    {
        return Role::where('slug', $slug)->first();
    }
}

if (!function_exists('permission')) {
    /**
     * Retorna uma Permission pelo slug.
     */
    function permission(string $slug): ?Permission
    {
        return Permission::where('slug', $slug)->first();
    }
}

if (!function_exists('isSuperAdmin')) {
    /**
     * Verifica se o usuário é Super Admin.
     */
    function isSuperAdmin(): bool
    {
        return hasRole('super-admin');
    }
}

if (!function_exists('isAdmin')) {
    /**
     * Verifica se o usuário é Administrador.
     */
    function isAdmin(): bool
    {
        return hasRole('admin');
    }
}