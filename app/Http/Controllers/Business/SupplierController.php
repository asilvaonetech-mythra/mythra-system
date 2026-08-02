<?php

namespace App\Http\Controllers\Business;

use App\Domains\Business\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{

    public function index()
    {
        return Supplier::query()
            ->with('organization')
            ->get();
    }



    public function create()
    {
        return response()->json([
            'message' => 'Formulário de criação de fornecedor ainda não implementado.',
        ]);
    }



    public function store(Request $request)
    {

        $data = $request->validate([

            'organization_id' => [

                'required',
                'integer',
                'exists:organizations,id',

            ],


            'nome' => [

                'required',
                'string',
                'max:255',

            ],


            'tipo' => [

                'nullable',
                'string',
                'max:100',

            ],


            'documento' => [

                'nullable',
                'string',
                'max:50',

            ],


            'email' => [

                'nullable',
                'email',
                'max:255',

            ],


            'telefone' => [

                'nullable',
                'string',
                'max:50',

            ],


            'endereco' => [

                'nullable',
                'string',

            ],


            'cidade' => [

                'nullable',
                'string',
                'max:100',

            ],


            'estado' => [

                'nullable',
                'string',
                'max:100',

            ],


            'observacoes' => [

                'nullable',
                'string',

            ],


            'status' => [

                'nullable',
                Rule::in([

                    'ativo',
                    'inativo',
                    'analise',

                ]),

            ],

        ]);



        $supplier = Supplier::create($data);



        return response()->json(

            $supplier->load('organization'),

            201

        );

    }



    public function show(Supplier $supplier)
    {
        return $supplier->load('organization');
    }



    public function edit(Supplier $supplier)
    {
        return $supplier->load('organization');
    }



    public function update(Request $request, Supplier $supplier)
    {

        $data = $request->validate([


            'nome' => [

                'sometimes',
                'required',
                'string',
                'max:255',

            ],


            'tipo' => [

                'nullable',
                'string',
                'max:100',

            ],


            'documento' => [

                'nullable',
                'string',
                'max:50',

            ],


            'email' => [

                'nullable',
                'email',
                'max:255',

            ],


            'telefone' => [

                'nullable',
                'string',
                'max:50',

            ],


            'endereco' => [

                'nullable',
                'string',

            ],


            'cidade' => [

                'nullable',
                'string',
                'max:100',

            ],


            'estado' => [

                'nullable',
                'string',
                'max:100',

            ],


            'observacoes' => [

                'nullable',
                'string',

            ],


            'status' => [

                'nullable',
                Rule::in([

                    'ativo',
                    'inativo',
                    'analise',

                ]),

            ],


        ]);



        $supplier->update($data);



        return $supplier
            ->fresh()
            ->load('organization');

    }



    public function destroy(Supplier $supplier)
    {

        $supplier->delete();


        return response()->noContent();

    }

}