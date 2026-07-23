<?php

namespace App\Services\Mythra;


use App\Support\Mythra\Modules;



class StateService
{


    /*
    |--------------------------------------------------------------------------
    | Estado Atual do Ecossistema Mythra
    |--------------------------------------------------------------------------
    */


    public function current(): array
    {


        $modules =
            Modules::all();



        $stateModules = [];



        foreach($modules as $key => $module){


            $stateModules[$key] = [

                'energy' =>
                    $this->calculateEnergy($module),


                'status' =>
                    'active',


                'domain' =>
                    $module['domain'] ?? null,


                'name' =>
                    $module['name'] ?? null

            ];


        }





        return [


            'system' =>
                'Mythra',



            'status' =>
                'online',



            'modules' =>
                $stateModules,



            'dominant' =>
                $this->dominant($stateModules),



            'risk' =>
                false,



            'avgEnergy' =>
                $this->averageEnergy($stateModules)


        ];



    }






    /*
    |--------------------------------------------------------------------------
    | Cálculo inicial de energia
    |--------------------------------------------------------------------------
    */


    private function calculateEnergy(array $module): int
    {


        $base = 70;



        if(isset($module['values'])){


            $base += count($module['values']) * 2;


        }



        if(isset($module['structure'])){


            $base += count($module['structure']);


        }



        return min(
            $base,
            100
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Domínio dominante
    |--------------------------------------------------------------------------
    */


    private function dominant(array $modules): string|null
    {


        $highest = 0;

        $winner = null;



        foreach($modules as $key => $module){



            if($module['energy'] > $highest){


                $highest =
                    $module['energy'];


                $winner =
                    $key;


            }


        }



        return $winner;


    }







    /*
    |--------------------------------------------------------------------------
    | Energia média
    |--------------------------------------------------------------------------
    */


    private function averageEnergy(array $modules): int
    {


        if(empty($modules)){

            return 0;

        }



        $total = 0;



        foreach($modules as $module){


            $total +=
                $module['energy'];


        }




        return round(
            $total / count($modules)
        );


    }



}