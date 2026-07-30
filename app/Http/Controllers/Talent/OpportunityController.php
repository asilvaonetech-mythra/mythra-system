<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Talent\Opportunity;
use App\Models\Talent\Organization;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Lista oportunidades.
     */
    public function index()
    {
        $opportunities = Opportunity::with('organization')
            ->latest()
            ->paginate(15);

        return view(
            'mythra.talent.opportunities.index',
            compact('opportunities')
        );
    }

    /**
     * Formulário de criação.
     */
    public function create()
    {
        $organizations = Organization::where('status', 'ativo')
            ->orderBy('nome')
            ->get();

        return view(
            'mythra.talent.opportunities.create',
            compact('organizations')
        );
    }

    /**
     * Criar oportunidade.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'organization_id' => [
                'required',
                'exists:organizations,id',
            ],

            'titulo' => [
                'required',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

            'modelo_trabalho' => [
                'nullable',
                'in:presencial,hibrido,remoto',
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nivel' => [
                'nullable',
                'in:iniciante,intermediario,avancado,especialista',
            ],

        ]);

        $validated['status'] = 'aberta';

        Opportunity::create($validated);

        return redirect()
            ->route('talent.opportunities.index')
            ->with(
                'success',
                'Oportunidade criada com sucesso.'
            );
    }

    /**
     * Visualizar oportunidade.
     */
    public function show(Opportunity $opportunity)
    {
        $opportunity->load([

            'organization',

            'opportunitySkills.skill',

            'selectionProcesses',

            'applications',

        ]);

        return view(
            'mythra.talent.opportunities.show',
            compact('opportunity')
        );
    }

    /**
     * Editar oportunidade.
     */
    public function edit(Opportunity $opportunity)
    {
        $organizations = Organization::orderBy('nome')
            ->get();

        return view(
            'mythra.talent.opportunities.edit',
            compact(
                'opportunity',
                'organizations'
            )
        );
    }

    /**
     * Atualizar oportunidade.
     */
    public function update(
        Request $request,
        Opportunity $opportunity
    ) {
        $validated = $request->validate([

            'organization_id' => [
                'required',
                'exists:organizations,id',
            ],

            'titulo' => [
                'required',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

            'modelo_trabalho' => [
                'nullable',
                'in:presencial,hibrido,remoto',
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nivel' => [
                'nullable',
                'in:iniciante,intermediario,avancado,especialista',
            ],

            'status' => [
                'required',
                'in:aberta,pausada,encerrada',
            ],

        ]);

        $opportunity->update($validated);

        return redirect()
            ->route(
                'talent.opportunities.show',
                $opportunity
            )
            ->with(
                'success',
                'Oportunidade atualizada com sucesso.'
            );
    }

    /**
     * Remover oportunidade.
     */
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()
            ->route('talent.opportunities.index')
            ->with(
                'success',
                'Oportunidade removida com sucesso.'
            );
    }
}