<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Lista usuários e roles.
     */
    public function index()
    {
        $users = User::with('roles')
            ->orderBy('name')
            ->paginate(20);

        return view(
            'core.user-roles.index',
            compact('users')
        );
    }


    /**
     * Formulário atribuição.
     */
    public function edit(User $user)
    {
        $roles = Role::active()
            ->orderBy('display_name')
            ->get();


        $user->load('roles');


        return view(
            'core.user-roles.edit',
            compact(
                'user',
                'roles'
            )
        );
    }


    /**
     * Atualizar roles do usuário.
     */
    public function update(
        Request $request,
        User $user
    ) {

        $data = $request->validate([

            'roles' => [
                'nullable',
                'array'
            ],

            'roles.*' => [
                'exists:roles,id'
            ],

        ]);


        $user->roles()
            ->sync(
                $data['roles'] ?? []
            );


        return redirect()
            ->route(
                'core.user-roles.index'
            )
            ->with(
                'success',
                'Permissões do usuário atualizadas.'
            );
    }


    /**
     * Adicionar uma role.
     */
    public function attach(
        Request $request,
        User $user
    ) {

        $request->validate([

            'role_id' => [
                'required',
                'exists:roles,id'
            ],

        ]);


        $user->roles()
            ->syncWithoutDetaching([

                $request->role_id => [

                    'assigned_at' => now(),

                ],

            ]);


        return back()
            ->with(
                'success',
                'Role adicionada.'
            );
    }


    /**
     * Remover uma role.
     */
    public function detach(
        User $user,
        Role $role
    ) {

        $user->roles()
            ->detach($role->id);


        return back()
            ->with(
                'success',
                'Role removida.'
            );
    }
}