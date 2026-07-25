<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | Core Seeders
        |--------------------------------------------------------------------------
        */

        $this->call([

            RoleSeeder::class,

            PermissionSeeder::class,

            SettingSeeder::class,

        ]);



        /*
        |--------------------------------------------------------------------------
        | Usuário padrão desenvolvimento
        |--------------------------------------------------------------------------
        */

        User::firstOrCreate(

            [
                'email' => 'test@example.com',
            ],

            [

                'name' => 'Test User',

                'password' => bcrypt('password'),

            ]

        );

    }
}