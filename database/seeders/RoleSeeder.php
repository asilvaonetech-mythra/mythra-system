<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Roles principais do Core Mythra.
     */
    public function run(): void
    {
        $roles = [

            'Administrador',

            'Gestor',

            'Operador',

            'Talent',

            'Organização',

        ];


        foreach ($roles as $role) {

            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web',
            ]);

        }
    }
}