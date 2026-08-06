<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Roles principais do Core Mythra.
     */
    public function run(): void
    {
        $roles = [

            [
                'name' => 'Administrador',
                'slug' => 'administrador',
                'display_name' => 'Administrador',
                'description' => 'Acesso completo ao ecossistema Mythra.',
                'color' => '#D4AF37',
                'icon' => 'shield',
                'is_system' => true,
                'is_active' => true,
            ],

            [
                'name' => 'Gestor',
                'slug' => 'gestor',
                'display_name' => 'Gestor',
                'description' => 'Responsável pela gestão dos módulos.',
                'color' => '#8A2BE2',
                'icon' => 'briefcase',
                'is_system' => true,
                'is_active' => true,
            ],

            [
                'name' => 'Operador',
                'slug' => 'operador',
                'display_name' => 'Operador',
                'description' => 'Usuário operacional do sistema.',
                'color' => '#6B7A3A',
                'icon' => 'user',
                'is_system' => true,
                'is_active' => true,
            ],

            [
                'name' => 'Talent',
                'slug' => 'talent',
                'display_name' => 'Talent',
                'description' => 'Acesso ao domínio Mythra Talent.',
                'color' => '#8A2BE2',
                'icon' => 'users',
                'is_system' => true,
                'is_active' => true,
            ],

            [
                'name' => 'Organização',
                'slug' => 'organizacao',
                'display_name' => 'Organização',
                'description' => 'Representa organizações dentro do ecossistema.',
                'color' => '#6B7A3A',
                'icon' => 'building',
                'is_system' => true,
                'is_active' => true,
            ],

        ];


        foreach ($roles as $role) {

            Role::firstOrCreate(
                [
                    'name' => $role['name'],
                ],
                $role
            );

        }
    }
}