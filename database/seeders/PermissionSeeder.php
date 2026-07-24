<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            /*
            |--------------------------------------------------------------------------
            | Core
            |--------------------------------------------------------------------------
            */

            [
                'module' => 'core',
                'name' => 'Acessar Core',
                'slug' => 'core.access',
            ],

            [
                'module' => 'core',
                'name' => 'Configurações do Core',
                'slug' => 'core.settings',
            ],



            /*
            |--------------------------------------------------------------------------
            | Usuários
            |--------------------------------------------------------------------------
            */

            [
                'module' => 'users',
                'name' => 'Visualizar Usuários',
                'slug' => 'users.view',
            ],

            [
                'module' => 'users',
                'name' => 'Criar Usuários',
                'slug' => 'users.create',
            ],

            [
                'module' => 'users',
                'name' => 'Editar Usuários',
                'slug' => 'users.edit',
            ],

            [
                'module' => 'users',
                'name' => 'Excluir Usuários',
                'slug' => 'users.delete',
            ],

            [
                'module' => 'users',
                'name' => 'Gerenciar Papéis de Usuários',
                'slug' => 'users.roles',
            ],



            /*
            |--------------------------------------------------------------------------
            | Roles
            |--------------------------------------------------------------------------
            */

            [
                'module' => 'roles',
                'name' => 'Visualizar Papéis',
                'slug' => 'roles.view',
            ],

            [
                'module' => 'roles',
                'name' => 'Criar Papéis',
                'slug' => 'roles.create',
            ],

            [
                'module' => 'roles',
                'name' => 'Editar Papéis',
                'slug' => 'roles.edit',
            ],

            [
                'module' => 'roles',
                'name' => 'Excluir Papéis',
                'slug' => 'roles.delete',
            ],

            [
                'module' => 'roles',
                'name' => 'Gerenciar Papéis',
                'slug' => 'roles.manage',
            ],



            /*
            |--------------------------------------------------------------------------
            | Permissões
            |--------------------------------------------------------------------------
            */

            [
                'module' => 'permissions',
                'name' => 'Visualizar Permissões',
                'slug' => 'permissions.view',
            ],

            [
                'module' => 'permissions',
                'name' => 'Criar Permissões',
                'slug' => 'permissions.create',
            ],

            [
                'module' => 'permissions',
                'name' => 'Editar Permissões',
                'slug' => 'permissions.edit',
            ],

            [
                'module' => 'permissions',
                'name' => 'Excluir Permissões',
                'slug' => 'permissions.delete',
            ],

            [
                'module' => 'permissions',
                'name' => 'Gerenciar Permissões',
                'slug' => 'permissions.manage',
            ],

        ];

        foreach ($permissions as $permission) {

            Permission::updateOrCreate(

                [
                    'slug' => $permission['slug'],
                ],

                [
                    'name'         => $permission['name'],
                    'slug'         => $permission['slug'],
                    'module'       => $permission['module'],
                    'display_name' => $permission['name'],
                    'description'  => null,
                    'is_system'    => true,
                    'is_active'    => true,
                ]

            );
        }
    }
}