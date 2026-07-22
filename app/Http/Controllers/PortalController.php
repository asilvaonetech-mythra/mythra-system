<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Entrada principal do Portal Mythra
     */
    public function index()
    {
        return view('portal.index');
    }


    /**
     * Estado atual do Ecossistema Mythra
     */
    public function state()
    {
        return response()->json([

            'system' => 'Mythra',

            'status' => 'online',

            'modules' => [

                'talent' => [
                    'energy' => 85,
                    'status' => 'active'
                ],

                'business' => [
                    'energy' => 70,
                    'status' => 'active'
                ],

                'insight' => [
                    'energy' => 65,
                    'status' => 'active'
                ],

                'academy' => [
                    'energy' => 90,
                    'status' => 'active'
                ],

                'marketing' => [
                    'energy' => 75,
                    'status' => 'active'
                ],

            ],

            'dominant' => 'academy',

            'risk' => false,

            'avgEnergy' => 77

        ]);
    }
}