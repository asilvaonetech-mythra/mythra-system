<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{


    /**
     * Login.
     */
    public function login(
        Request $request
    )
    {


        $credentials = $request->validate([


            'email' => [

                'required',

                'email'

            ],


            'password' => [

                'required'

            ],


        ]);



        if (
            !Auth::attempt($credentials)
        ) {


            return back()

                ->withErrors([

                    'email' => 'Credenciais inválidas.'

                ]);

        }



        $request->session()->regenerate();



        $user = Auth::user();



        $user->updateLastLogin();



        return redirect()

            ->route('portal');


    }





    /**
     * Registro.
     */
    public function register(
        Request $request
    )
    {


        $data = $request->validate([


            'name' => [

                'required',

                'string',

                'max:255'

            ],


            'email' => [

                'required',

                'email',

                'unique:users'

            ],


            'password' => [

                'required',

                'confirmed',

                'min:8'

            ],


        ]);



        $user = User::create([


            'name' => $data['name'],


            'email' => $data['email'],


            'password' => Hash::make(

                $data['password']

            ),


            'is_active' => true,


        ]);



        $userRole = \App\Models\Role::where(

            'slug',

            'user'

        )->first();



        if ($userRole) {


            $user->assignRole(

                $userRole,

                true

            );


        }



        Auth::login($user);



        $user->updateLastLogin();



        return redirect()

            ->route('portal');


    }





    /**
     * Logout.
     */
    public function logout(
        Request $request
    )
    {


        Auth::logout();



        $request->session()->invalidate();



        $request->session()->regenerateToken();



        return redirect()

            ->route('login');


    }


}