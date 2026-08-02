<?php

namespace App\Http\Controllers\Business;

use App\Domains\Business\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{

    public function index()
    {
        return Customer::query()
            ->with('organization')
            ->get();
    }


    public function create()
    {
        return response()->json([
            'message' => 'Formulário de criação de cliente ainda não implementado.',
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


        $customer = Customer::create($data);


        return response()->json(
            $customer->load('organization'),
            201
        );

    }


    public function show(Customer $customer)
    {
        return $customer->load('organization');
    }


    public function edit(Customer $customer)
    {
        return $customer->load('organization');
    }


    public function update(Request $request, Customer $customer)
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


        $customer->update($data);


        return $customer
            ->fresh()
            ->load('organization');

    }


    public function destroy(Customer $customer)
    {

        $customer->delete();


        return response()->noContent();

    }

}