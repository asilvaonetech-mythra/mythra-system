<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;


class RoleSeeder extends Seeder
{

    /**
     * Executa o seeder.
     */
    public function run(): void
    {


        $roles = [


            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Acesso total ao sistema Mythra.',
                'color' => '#D4AF37',
                'icon' => 'shield',
                'is_system' => true,
                'is_active' => true,
            ],


            [
                'name' => 'Gestor',
                'slug' => 'manager',
                'display_name' => 'Gestor',
                'description' => 'Gerenciamento operacional.',
                'color' => '#8A2BE2',
                'icon' => 'user-cog',
                'is_system' => true,
                'is_active' => true,
            ],


            [
                'name' => 'Usuário',
                'slug' => 'user',
                'display_name' => 'Usuário',
                'description' => 'Usuário padrão do sistema.',
                'color' => '#6B7A3A',
                'icon' => 'user',
                'is_system' => true,
                'is_active' => true,
            ],


        ];



        foreach ($roles as $data) {


            Role::updateOrCreate(

                [
                    'slug' => $data['slug']
                ],

                $data

            );


        }



        /*
        |--------------------------------------------------------------------------
        | Permissões Administrador
        |--------------------------------------------------------------------------
        */


        $admin = Role::where(

            'slug',

            'admin'

        )->first();



        if ($admin) {


            $permissions = Permission::pluck('id')
                ->toArray();



            foreach ($permissions as $permission) {


                $admin->permissions()
                    ->syncWithoutDetaching([

                        $permission => [

                            'allowed' => true,

                            'granted_at' => now(),

                        ]

                    ]);


            }


        }

    }

}