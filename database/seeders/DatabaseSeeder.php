<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Executa os seeders principais.
     */
    public function run(): void
    {
        $this->call([

            /*
            |--------------------------------------------------------------------------
            | Core Mythra
            |--------------------------------------------------------------------------
            */

            RoleSeeder::class,

            PermissionSeeder::class,

            SettingSeeder::class,


            /*
            |--------------------------------------------------------------------------
            | Domínios Mythra
            |--------------------------------------------------------------------------
            */

            MarketingPermissionSeeder::class,

        ]);
    }
}