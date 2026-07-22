<?php

namespace App\Services\Mythra;

use App\Support\Mythra\Modules;
use App\Support\Mythra\Domains;
use App\Support\Mythra\Journeys;


class ModuleService
{


    /*
    |--------------------------------------------------------------------------
    | Retorna um módulo completo
    |--------------------------------------------------------------------------
    */

    public function find(string $module): ?array
    {


        $data = Modules::find($module);



        if(!$data){

            return null;

        }



        /*
        |--------------------------------------------------------------------------
        | Complementos do Domínio
        |--------------------------------------------------------------------------
        */


        if(method_exists(Domains::class, $module)){


            $data['details'] =
                Domains::$module();


        }



        /*
        |--------------------------------------------------------------------------
        | Jornada do Atendente
        |--------------------------------------------------------------------------
        */


        if(isset($data['attendant']['name'])){


            $journey = Journeys::find(
                $data['attendant']['name']
            );


            if($journey){


                $data['journey'] =
                    $journey;


            }


        }



        return $data;


    }




    /*
    |--------------------------------------------------------------------------
    | Todos os módulos
    |--------------------------------------------------------------------------
    */

    public function all(): array
    {


        return Modules::all();


    }




    /*
    |--------------------------------------------------------------------------
    | Módulos ordenados
    |--------------------------------------------------------------------------
    */

    public function ordered(): array
    {


        return Modules::all();


    }




    /*
    |--------------------------------------------------------------------------
    | Pesquisa
    |--------------------------------------------------------------------------
    */

    public function search(string $term): array
    {


        $results = [];



        foreach(Modules::all() as $module){



            if(

                str_contains(
                    strtolower($module['name']),
                    strtolower($term)
                )

                ||

                str_contains(
                    strtolower($module['domain']),
                    strtolower($term)
                )

            ){


                $results[] =
                    $module;


            }


        }



        return $results;


    }


}