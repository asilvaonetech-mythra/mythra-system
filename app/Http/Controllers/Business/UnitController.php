<?php

namespace App\Http\Controllers\Business;

use App\Domains\Business\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    public function index()
    {
        return Unit::query()
            ->with('organization')
            ->get();
    }

    public function create()
    {
        return response()->json([
            'message' => 'Formulário de criação de unidade ainda não implementado.',
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

            'descricao' => [
                'nullable',
                'string',
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                Rule::in([
                    'ativa',
                    'inativa',
                    'analise',
                ]),
            ],
        ]);

        $unit = Unit::create($data);

        return response()->json(
            $unit->load('organization'),
            201
        );
    }

    public function show(Unit $unit)
    {
        return $unit->load('organization');
    }

    public function edit(Unit $unit)
    {
        return $unit->load('organization');
    }

    public function update(Request $request, Unit $unit)
    {
        $data = $request->validate([
            'organization_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:organizations,id',
            ],

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

            'descricao' => [
                'nullable',
                'string',
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                Rule::in([
                    'ativa',
                    'inativa',
                    'analise',
                ]),
            ],
        ]);

        $unit->update($data);

        return $unit->fresh()
            ->load('organization');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->noContent();
    }
}