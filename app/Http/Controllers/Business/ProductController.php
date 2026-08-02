<?php

namespace App\Http\Controllers\Business;

use App\Domains\Business\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{

    public function index()
    {
        return Product::query()
            ->with('organization')
            ->get();
    }



    public function create()
    {
        return response()->json([

            'message' => 'Formulário de criação de produto ainda não implementado.',

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



            'codigo' => [

                'nullable',
                'string',
                'max:100',

            ],



            'tipo' => [

                'nullable',
                'string',
                'max:100',

            ],



            'categoria' => [

                'nullable',
                'string',
                'max:100',

            ],



            'descricao' => [

                'nullable',
                'string',

            ],



            'valor' => [

                'nullable',
                'numeric',

            ],



            'unidade' => [

                'nullable',
                'string',
                'max:50',

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



        $product = Product::create($data);



        return response()->json(

            $product->load('organization'),

            201

        );

    }




    public function show(Product $product)
    {
        return $product->load('organization');
    }




    public function edit(Product $product)
    {
        return $product->load('organization');
    }




    public function update(Request $request, Product $product)
    {

        $data = $request->validate([



            'nome' => [

                'sometimes',
                'required',
                'string',
                'max:255',

            ],



            'codigo' => [

                'nullable',
                'string',
                'max:100',

            ],



            'tipo' => [

                'nullable',
                'string',
                'max:100',

            ],



            'categoria' => [

                'nullable',
                'string',
                'max:100',

            ],



            'descricao' => [

                'nullable',
                'string',

            ],



            'valor' => [

                'nullable',
                'numeric',

            ],



            'unidade' => [

                'nullable',
                'string',
                'max:50',

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



        $product->update($data);



        return $product
            ->fresh()
            ->load('organization');

    }




    public function destroy(Product $product)
    {

        $product->delete();



        return response()->noContent();

    }

}