<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Talent\TalentApplication;
use App\Models\Talent\Opportunity;
use App\Models\Talent\TalentProfile;
use App\Models\Talent\SelectionProcess;
use Illuminate\Http\Request;

class TalentApplicationController extends Controller
{
    /**
     * Lista conexões entre talentos e oportunidades.
     */
    public function index()
    {
        $applications = TalentApplication::with([

                'talentProfile',

                'opportunity.organization',

                'selectionProcess',

            ])
            ->latest()
            ->paginate(15);


        return view(
            'mythra.talent.applications.index',
            compact('applications')
        );
    }


    /**
     * Formulário de criação de conexão.
     */
    public function create()
    {
        $talents = TalentProfile::orderBy('nome_completo')
            ->get();


        $opportunities = Opportunity::where('status', 'aberta')
            ->orderBy('titulo')
            ->get();


        $processes = SelectionProcess::where(
                'status',
                '!=',
                'cancelado'
            )
            ->orderBy('nome')
            ->get();


        return view(
            'mythra.talent.applications.create',
            compact(
                'talents',
                'opportunities',
                'processes'
            )
        );
    }


    /**
     * Criar conexão.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'talent_profile_id' => [
                'required',
                'exists:talent_profiles,id',
            ],

            'opportunity_id' => [
                'required',
                'exists:opportunities,id',
            ],

            'selection_process_id' => [
                'nullable',
                'exists:selection_processes,id',
            ],

            'observacao' => [
                'nullable',
                'string',
            ],

        ]);


        $validated['status'] = 'enviado';


        TalentApplication::create($validated);


        return redirect()
            ->route('talent.applications.index')
            ->with(
                'success',
                'Conexão criada com sucesso.'
            );
    }


    /**
     * Exibir conexão.
     */
    public function show(
        TalentApplication $talentApplication
    ) {
        $talentApplication->load([

            'talentProfile',

            'opportunity.organization',

            'selectionProcess',

        ]);


        return view(
            'mythra.talent.applications.show',
            compact('talentApplication')
        );
    }


    /**
     * Editar conexão.
     */
    public function edit(
        TalentApplication $talentApplication
    ) {
        return view(
            'mythra.talent.applications.edit',
            compact('talentApplication')
        );
    }


    /**
     * Atualizar status da conexão.
     */
    public function update(
        Request $request,
        TalentApplication $talentApplication
    ) {
        $validated = $request->validate([

            'status' => [
                'required',
                'in:enviado,em_analise,aprovado,reprovado,cancelado',
            ],

            'observacao' => [
                'nullable',
                'string',
            ],

        ]);


        $talentApplication->update($validated);


        return redirect()
            ->route(
                'talent.applications.show',
                $talentApplication
            )
            ->with(
                'success',
                'Conexão atualizada com sucesso.'
            );
    }


    /**
     * Remover conexão.
     */
    public function destroy(
        TalentApplication $talentApplication
    ) {
        $talentApplication->delete();


        return redirect()
            ->route('talent.applications.index')
            ->with(
                'success',
                'Conexão removida com sucesso.'
            );
    }
}