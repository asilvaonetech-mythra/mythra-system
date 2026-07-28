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


        /*
        |--------------------------------------------------------------------------
        | Core Mythra
        |--------------------------------------------------------------------------
        */


        $this->call([


            PermissionSeeder::class,


            RoleSeeder::class,


            UserSeeder::class,


            SettingSeeder::class,


        ]);


    }

}