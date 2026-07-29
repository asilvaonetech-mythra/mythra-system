<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    /**
     * Lista organizações.
     */
    public function index()
    {
        $organizations = Organization::with('responsibleUser')
            ->latest()
            ->paginate(15);


        return view(
            'mythra.talent.organizations.index',
            compact('organizations')
        );
    }


    /**
     * Formulário de criação.
     */
    public function create()
    {
        return view(
            'mythra.talent.organizations.create'
        );
    }


    /**
     * Criar organização.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nome' => [
                'required',
                'string',
                'max:255'
            ],

            'documento' => [
                'nullable',
                'string',
                'max:50'
            ],

            'segmento' => [
                'nullable',
                'string',
                'max:255'
            ],

            'descricao' => [
                'nullable',
                'string'
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255'
            ],

        ]);


        $validated['responsavel_user_id'] = Auth::id();


        Organization::create($validated);


        return redirect()
            ->route('talent.organizations.index')
            ->with(
                'success',
                'Organização criada com sucesso.'
            );
    }


    /**
     * Visualizar organização.
     */
    public function show(Organization $organization)
    {
        $organization->load('opportunities');


        return view(
            'mythra.talent.organizations.show',
            compact('organization')
        );
    }


    /**
     * Editar organização.
     */
    public function edit(Organization $organization)
    {
        return view(
            'mythra.talent.organizations.edit',
            compact('organization')
        );
    }


    /**
     * Atualizar organização.
     */
    public function update(
        Request $request,
        Organization $organization
    )
    {
        $validated = $request->validate([

            'nome' => [
                'required',
                'string',
                'max:255'
            ],

            'documento' => [
                'nullable',
                'string',
                'max:50'
            ],

            'segmento' => [
                'nullable',
                'string',
                'max:255'
            ],

            'descricao' => [
                'nullable',
                'string'
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255'
            ],

        ]);


        $organization->update($validated);


        return redirect()
            ->route('talent.organizations.show', $organization)
            ->with(
                'success',
                'Organização atualizada com sucesso.'
            );
    }


    /**
     * Remover organização.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();


        return redirect()
            ->route('talent.organizations.index')
            ->with(
                'success',
                'Organização removida com sucesso.'
            );
    }
}