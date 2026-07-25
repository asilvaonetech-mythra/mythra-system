<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [

            /*
            |--------------------------------------------------------------------------
            | Sistema
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'system',
                'key' => 'system.name',
                'display_name' => 'Nome do Sistema',
                'description' => 'Nome principal da plataforma.',
                'value' => 'Mythra System',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'system',
                'key' => 'system.short_name',
                'display_name' => 'Nome Curto',
                'description' => 'Nome reduzido do sistema.',
                'value' => 'Mythra',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'system',
                'key' => 'system.version',
                'display_name' => 'Versão do Sistema',
                'description' => 'Versão atual.',
                'value' => '1.0.0',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],



            /*
            |--------------------------------------------------------------------------
            | Aparência
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'appearance',
                'key' => 'theme.primary_color',
                'display_name' => 'Cor Primária',
                'description' => 'Cor principal da identidade visual.',
                'value' => '#8A2BE2',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'appearance',
                'key' => 'theme.secondary_color',
                'display_name' => 'Cor Secundária',
                'description' => 'Cor complementar.',
                'value' => '#6B7A3A',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'appearance',
                'key' => 'theme.gold_color',
                'display_name' => 'Cor Dourada',
                'description' => 'Cor dourada Mythra.',
                'value' => '#D4AF37',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],



            /*
            |--------------------------------------------------------------------------
            | Localização
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'localization',
                'key' => 'app.locale',
                'display_name' => 'Idioma',
                'description' => 'Idioma padrão.',
                'value' => 'pt_BR',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'localization',
                'key' => 'app.timezone',
                'display_name' => 'Fuso Horário',
                'description' => 'Fuso horário padrão.',
                'value' => 'America/Sao_Paulo',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'localization',
                'key' => 'app.currency',
                'display_name' => 'Moeda',
                'description' => 'Moeda padrão.',
                'value' => 'BRL',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],



            /*
            |--------------------------------------------------------------------------
            | Empresa
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'company',
                'key' => 'company.name',
                'display_name' => 'Nome da Empresa',
                'description' => 'Nome da organização.',
                'value' => 'Mythra',
                'type' => 'string',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'company',
                'key' => 'company.email',
                'display_name' => 'E-mail Principal',
                'description' => 'Contato principal.',
                'value' => null,
                'type' => 'string',
                'is_system' => false,
                'autoload' => false,
            ],



            /*
            |--------------------------------------------------------------------------
            | Segurança
            |--------------------------------------------------------------------------
            */

            [
                'group' => 'security',
                'key' => 'security.session_timeout',
                'display_name' => 'Tempo de Sessão',
                'description' => 'Tempo em minutos.',
                'value' => '120',
                'type' => 'integer',
                'is_system' => true,
                'autoload' => true,
            ],

            [
                'group' => 'security',
                'key' => 'security.audit_enabled',
                'display_name' => 'Auditoria Ativa',
                'description' => 'Ativa registros de auditoria.',
                'value' => 'true',
                'type' => 'boolean',
                'is_system' => true,
                'autoload' => true,
            ],

        ];


        foreach ($settings as $setting) {

            Setting::updateOrCreate(

                [
                    'key' => $setting['key'],
                ],

                [

                    ...$setting,

                    'is_active' => true,

                ]

            );

        }
    }
}