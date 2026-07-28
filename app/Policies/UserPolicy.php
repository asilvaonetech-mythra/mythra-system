<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    /**
     * Visualizar usuários.
     */
    public function viewAny(
        User $user
    ): bool {

        return $user->hasPermission(
            'users.view'
        );

    }


    /**
     * Visualizar usuário específico.
     */
    public function view(
        User $user,
        User $model
    ): bool {

        return $user->hasPermission(
            'users.view'
        );

    }


    /**
     * Criar usuário.
     */
    public function create(
        User $user
    ): bool {

        return $user->hasPermission(
            'users.create'
        );

    }


    /**
     * Atualizar usuário.
     */
    public function update(
        User $user,
        User $model
    ): bool {

        return $user->hasPermission(
            'users.edit'
        );

    }


    /**
     * Excluir usuário.
     */
    public function delete(
        User $user,
        User $model
    ): bool {

        return $user->hasPermission(
            'users.delete'
        );

    }


    /**
     * Restaurar usuário.
     */
    public function restore(
        User $user,
        User $model
    ): bool {

        return $user->hasPermission(
            'users.restore'
        );

    }


    /**
     * Excluir permanentemente.
     */
    public function forceDelete(
        User $user,
        User $model
    ): bool {

        return false;

    }

}