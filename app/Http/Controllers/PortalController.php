<?php

namespace App\Http\Controllers;


use App\Services\Mythra\StateService;



class PortalController extends Controller
{


    protected StateService $state;



    public function __construct(StateService $state)
    {


        $this->state =
            $state;


    }




    public function index()
    {


        return view(
            'portal.index'
        );


    }




    public function state()
    {


        return response()->json(

            $this->state->current()

        );


    }


}