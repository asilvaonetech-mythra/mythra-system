<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Permissões gerais do Core Mythra.
     */
    public function run(): void
    {
        $permissions = [

            /*
            |--------------------------------------------------------------------------
            | Core
            |--------------------------------------------------------------------------
            */

            'core.access',

            'core.settings',

            'core.audit',



            /*
            |--------------------------------------------------------------------------
            | Portal
            |--------------------------------------------------------------------------
            */

            'portal.access',



            /*
            |--------------------------------------------------------------------------
            | Usuários
            |--------------------------------------------------------------------------
            */

            'users.view',

            'users.create',

            'users.update',

            'users.delete',


        ];


        foreach ($permissions as $permission) {

            Permission::firstOrCreate([

                'name' => $permission,

                'guard_name' => 'web',

            ]);

        }
    }
}