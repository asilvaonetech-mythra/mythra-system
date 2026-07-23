<?php

namespace App\Http\Controllers;

use App\Support\Mythra\Core;



class CoreController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Entrada principal Mythra Core
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        return view(
            'core.index',
            [
                'core' => Core::data()
            ]
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Exibe núcleo específico
    |--------------------------------------------------------------------------
    */


    public function show(string $section)
    {


        $core =
            Core::data();




        if(!isset($core[$section])){


            abort(404);


        }




        return view(
            'core.section',
            [

                'section' =>
                    $core[$section]

            ]
        );


    }



}