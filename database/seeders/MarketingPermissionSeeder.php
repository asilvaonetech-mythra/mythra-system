<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class MarketingPermissionSeeder extends Seeder
{
    /**
     * Permissões do domínio Mythra Marketing.
     */
    public function run(): void
    {

        $permissions = [

            /*
            |--------------------------------------------------------------------------
            | Acesso geral
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.access',
                'slug' => 'marketing.access',
                'module' => 'marketing',
                'display_name' => 'Acessar Marketing',
                'description' => 'Permite acesso ao domínio Mythra Marketing.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Campanhas
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.campaigns.view',
                'slug' => 'marketing.campaigns.view',
                'module' => 'marketing',
                'display_name' => 'Visualizar campanhas',
                'description' => 'Permite visualizar campanhas de marketing.',
            ],

            [
                'name' => 'marketing.campaigns.manage',
                'slug' => 'marketing.campaigns.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar campanhas',
                'description' => 'Permite criar, editar e remover campanhas.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Conteúdo
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.contents.manage',
                'slug' => 'marketing.contents.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar conteúdos',
                'description' => 'Permite administrar conteúdos digitais.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Publicações
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.publications.manage',
                'slug' => 'marketing.publications.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar publicações',
                'description' => 'Permite administrar publicações.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Redes sociais
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.social_networks.manage',
                'slug' => 'marketing.social_networks.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar redes sociais',
                'description' => 'Permite administrar canais sociais.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Marca
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.brand.manage',
                'slug' => 'marketing.brand.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar identidade de marca',
                'description' => 'Permite administrar identidade visual.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Biblioteca de mídia
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.assets.manage',
                'slug' => 'marketing.assets.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar biblioteca de mídia',
                'description' => 'Permite administrar imagens, vídeos e áudios.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Comunicação
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.communication.manage',
                'slug' => 'marketing.communication.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar comunicação',
                'description' => 'Permite administrar comunicações.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Métricas
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.metrics.view',
                'slug' => 'marketing.metrics.view',
                'module' => 'marketing',
                'display_name' => 'Visualizar métricas',
                'description' => 'Permite consultar indicadores.',
            ],


            /*
            |--------------------------------------------------------------------------
            | Automações
            |--------------------------------------------------------------------------
            */

            [
                'name' => 'marketing.automations.manage',
                'slug' => 'marketing.automations.manage',
                'module' => 'marketing',
                'display_name' => 'Gerenciar automações',
                'description' => 'Permite administrar automações.',
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