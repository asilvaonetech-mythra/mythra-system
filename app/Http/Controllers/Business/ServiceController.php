<?php

namespace App\Http\Controllers\Business;

use App\Domains\Business\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ServiceController extends Controller
{


    public function index()
    {
        return Service::with('organization')
            ->get();
    }



    public function create()
    {
        return response()->json([

            'message' => 'Formulário de criação de serviço.'

        ]);
    }



    public function store(Request $request)
    {

        $data = $request->validate([


            'organization_id' => [

                'required',
                'exists:organizations,id'

            ],


            'nome' => [

                'required',
                'string'

            ],


            'codigo' => [

                'nullable',
                'string'

            ],


            'categoria' => [

                'nullable',
                'string'

            ],


            'descricao' => [

                'nullable',
                'string'

            ],


            'valor' => [

                'nullable',
                'numeric'

            ],


            'duracao' => [

                'nullable',
                'integer'

            ],


            'status' => [

                'nullable',
                Rule::in([

                    'ativo',
                    'inativo',
                    'analise'

                ])

            ],


        ]);



        return Service::create($data);

    }



    public function show(Service $service)
    {
        return $service->load('organization');
    }



    public function edit(Service $service)
    {
        return $service->load('organization');
    }



    public function update(Request $request, Service $service)
    {

        $service->update(
            $request->all()
        );


        return $service
            ->fresh()
            ->load('organization');

    }



    public function destroy(Service $service)
    {

        $service->delete();


        return response()->noContent();

    }


}