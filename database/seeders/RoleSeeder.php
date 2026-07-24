<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [

            [
                'name'         => 'Super Administrador',
                'slug'         => 'super-admin',
                'display_name' => 'Super Administrador',
                'description'  => 'Acesso total ao sistema.',
                'color'        => '#C1B16A',
                'icon'         => 'shield-star',
                'is_system'    => true,
                'is_active'    => true,
            ],

            [
                'name'         => 'Administrador',
                'slug'         => 'admin',
                'display_name' => 'Administrador',
                'description'  => 'Administrador geral.',
                'color'        => '#8A2BE2',
                'icon'         => 'shield',
                'is_system'    => true,
                'is_active'    => true,
            ],

            [
                'name'         => 'Gestor',
                'slug'         => 'manager',
                'display_name' => 'Gestor',
                'description'  => 'Gerencia módulos e equipes.',
                'color'        => '#6B7A3A',
                'icon'         => 'briefcase',
                'is_system'    => true,
                'is_active'    => true,
            ],

            [
                'name'         => 'Operador',
                'slug'         => 'operator',
                'display_name' => 'Operador',
                'description'  => 'Operação diária do sistema.',
                'color'        => '#3B82F6',
                'icon'         => 'monitor',
                'is_system'    => true,
                'is_active'    => true,
            ],

            [
                'name'         => 'Usuário',
                'slug'         => 'user',
                'display_name' => 'Usuário',
                'description'  => 'Usuário padrão.',
                'color'        => '#64748B',
                'icon'         => 'user',
                'is_system'    => true,
                'is_active'    => true,
            ],

        ];

        foreach ($roles as $role) {

            Role::updateOrCreate(

                [
                    'slug' => $role['slug'],
                ],

                $role

            );

        }
    }
}