<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{

    /**
     * Executa o seeder.
     */
    public function run(): void
    {


        $adminRole = Role::where(

            'slug',

            'admin'

        )->first();



        $user = User::updateOrCreate(

            [

                'email' => 'admin@mythra.com'

            ],

            [

                'name' => 'Administrador Mythra',

                'password' => Hash::make(

                    '12345678'

                ),

                'is_active' => true,

            ]

        );



        if ($adminRole) {


            $user->assignRole(

                $adminRole,

                true

            );


        }


    }

}