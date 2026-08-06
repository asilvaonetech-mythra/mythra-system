<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Permissões principais do Core Mythra.
     */
    public function run(): void
    {
        $permissions = [

            [
                'name' => 'core.access',
                'slug' => 'core.access',
                'module' => 'core',
                'display_name' => 'Acessar Core',
                'description' => 'Permite acesso ao núcleo do ecossistema Mythra.',
            ],

            [
                'name' => 'core.manage_users',
                'slug' => 'core.manage_users',
                'module' => 'core',
                'display_name' => 'Gerenciar usuários',
                'description' => 'Permite administrar usuários do ecossistema.',
            ],

            [
                'name' => 'core.manage_roles',
                'slug' => 'core.manage_roles',
                'module' => 'core',
                'display_name' => 'Gerenciar papéis',
                'description' => 'Permite administrar papéis de acesso.',
            ],

            [
                'name' => 'core.manage_permissions',
                'slug' => 'core.manage_permissions',
                'module' => 'core',
                'display_name' => 'Gerenciar permissões',
                'description' => 'Permite administrar permissões do sistema.',
            ],

        ];


        foreach ($permissions as $permission) {

            Permission::firstOrCreate(

                [
                    'name' => $permission['name'],
                ],

                [
                    'slug' => $permission['slug'],

                    'module' => $permission['module'],

                    'display_name' => $permission['display_name'],

                    'description' => $permission['description'],

                    'is_system' => true,

                    'is_active' => true,
                ]

            );

        }
    }
}
