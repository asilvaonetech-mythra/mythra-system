<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;


class UserRoleController extends Controller
{


    /**
     * Lista usuários e suas roles.
     */
    public function index()
    {

        $users = User::with('roles')
            ->orderBy('name')
            ->get();


        return view(
            'core.user-roles.index',
            compact('users')
        );

    }





    /**
     * Tela de edição de roles.
     */
    public function edit(User $user)
    {

        $roles = Role::where('is_active', true)
            ->orderBy('name')
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
     * Atualiza roles do usuário.
     */
    public function update(
        Request $request,
        User $user
    )
    {


        $request->validate([

            'roles' => [
                'nullable',
                'array'
            ],

            'primary_role' => [
                'nullable'
            ],

        ]);




        $roles = $request->roles ?? [];



        $user->roles()
            ->sync($roles);





        if ($request->primary_role) {


            $user->roles()
                ->updateExistingPivot(
                    $roles,
                    [
                        'is_primary' => false
                    ]
                );



            $user->roles()
                ->updateExistingPivot(
                    $request->primary_role,
                    [
                        'is_primary' => true,
                        'assigned_at' => now()
                    ]
                );

        }



        return redirect()
            ->route('core.user-roles.index')
            ->with(
                'success',
                'Roles atualizadas com sucesso.'
            );

    }





    /**
     * Vincula uma Role.
     */
    public function attach(
        Request $request,
        User $user
    )
    {


        $request->validate([

            'role_id' => [
                'required'
            ]

        ]);



        $user->assignRole(
            $request->role_id
        );



        return back();

    }





    /**
     * Remove Role.
     */
    public function detach(
        User $user,
        Role $role
    )
    {


        $user->removeRole(
            $role
        );


        return back();

    }


}