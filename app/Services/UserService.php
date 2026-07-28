<?php

namespace App\Services;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class UserService
{

    /**
     * Lista usuários paginados.
     */
    public function paginate(
        ?string $search = null,
        int $perPage = 15
    ): LengthAwarePaginator {


        return User::query()

            ->with('roles')

            ->when($search, function ($query) use ($search) {


                $query->where(function ($q) use ($search) {


                    $q->where(
                        'name',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'email',
                        'like',
                        "%{$search}%"
                    );


                });


            })

            ->latest()

            ->paginate($perPage)

            ->withQueryString();


    }





    /**
     * Buscar usuário.
     */
    public function find(
        int $id
    ): User {


        return User::with('roles')

            ->findOrFail($id);


    }





    /**
     * Criar usuário.
     */
    public function create(
        array $data
    ): User {


        return DB::transaction(function () use ($data) {


            $user = User::create([


                'name' => $data['name'],


                'email' => $data['email'],


                'password' => Hash::make(

                    $data['password']

                ),


                'is_active' => true,


            ]);



            if (
                isset($data['roles'])
                &&
                is_array($data['roles'])
            ) {


                $user->syncRoles(

                    $data['roles']

                );


            }



            $this->clearPermissionCache(

                $user

            );



            return $user;


        });


    }





    /**
     * Atualizar usuário.
     */
    public function update(
        User $user,
        array $data
    ): User {


        return DB::transaction(function () use ($user, $data) {


            $payload = [


                'name' => $data['name'],


                'email' => $data['email'],


            ];



            if (
                !empty($data['password'])
            ) {


                $payload['password'] = Hash::make(

                    $data['password']

                );


            }



            $user->update(

                $payload

            );



            if (
                isset($data['roles'])
                &&
                is_array($data['roles'])
            ) {


                $user->syncRoles(

                    $data['roles']

                );


            }



            $this->clearPermissionCache(

                $user

            );



            return $user->fresh('roles');


        });


    }





    /**
     * Excluir usuário.
     */
    public function delete(
        User $user
    ): void {


        DB::transaction(function () use ($user) {


            $user->clearRoles();


            $user->delete();



            $this->clearPermissionCache(

                $user

            );


        });


    }





    /**
     * Ativar usuário.
     */
    public function activate(
        User $user
    ): void {


        $user->activate();



        $this->clearPermissionCache(

            $user

        );


    }





    /**
     * Desativar usuário.
     */
    public function deactivate(
        User $user
    ): void {


        $user->deactivate();



        $this->clearPermissionCache(

            $user

        );


    }





    /**
     * Limpa cache de permissões.
     */
    protected function clearPermissionCache(
        User $user
    ): void {


        Cache::forget(

            "user_permissions_{$user->id}"

        );


    }


}