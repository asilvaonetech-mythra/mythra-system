<?php

namespace App\Services\Mythra;

use App\Support\Mythra\Modules;
use App\Support\Mythra\Domains;


class ModuleService
{


    public function find(string $module): ?array
    {


        $data = Modules::find($module);



        if(!$data){

            return null;

        }



        /*
        |--------------------------------------------------------------------------
        | Complementos dos Domínios
        |--------------------------------------------------------------------------
        */


        if($module === 'core'){


            $data['details'] =
                Domains::core();


        }



        return $data;


    }


}