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
        | Seeders do Core
        |--------------------------------------------------------------------------
        */

        $this->call([

            RoleSeeder::class,

            PermissionSeeder::class,

        ]);


        /*
        |--------------------------------------------------------------------------
        | Usuário padrão (apenas para desenvolvimento)
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