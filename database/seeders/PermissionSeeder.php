<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Permission;


class PermissionSeeder extends Seeder
{

    /**
     * Executa o seeder.
     */
    public function run(): void
    {


        $permissions = [


            [
                'name' => 'Visualizar usuários',
                'slug' => 'users.view',
                'description' => 'Permite visualizar usuários do sistema.',
            ],


            [
                'name' => 'Criar usuários',
                'slug' => 'users.create',
                'description' => 'Permite criar usuários.',
            ],


            [
                'name' => 'Editar usuários',
                'slug' => 'users.edit',
                'description' => 'Permite editar usuários.',
            ],


            [
                'name' => 'Excluir usuários',
                'slug' => 'users.delete',
                'description' => 'Permite excluir usuários.',
            ],


            [
                'name' => 'Restaurar usuários',
                'slug' => 'users.restore',
                'description' => 'Permite restaurar usuários excluídos.',
            ],


            [
                'name' => 'Gerenciar roles de usuários',
                'slug' => 'users.roles',
                'description' => 'Permite vincular usuários a roles.',
            ],


            [
                'name' => 'Gerenciar roles',
                'slug' => 'roles.manage',
                'description' => 'Permite gerenciar roles.',
            ],


            [
                'name' => 'Gerenciar permissões',
                'slug' => 'permissions.manage',
                'description' => 'Permite gerenciar permissões.',
            ],


            [
                'name' => 'Configurações do Core',
                'slug' => 'core.settings',
                'description' => 'Permite acessar configurações globais.',
            ],


        ];



        foreach ($permissions as $permission) {


            Permission::updateOrCreate(

                [
                    'slug' => $permission['slug']
                ],

                $permission

            );


        }


    }

}