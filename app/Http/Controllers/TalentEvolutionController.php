<?php

namespace App\Http\Controllers;

use App\Models\TalentEvolution;
use App\Models\TalentProfile;
use Illuminate\Http\Request;

class TalentEvolutionController extends Controller
{
    /**
     * Lista evoluções dos talentos.
     */
    public function index()
    {
        $evolutions = TalentEvolution::with('talentProfile')
            ->latest()
            ->paginate(15);


        return view(
            'mythra.talent.evolutions.index',
            compact('evolutions')
        );
    }


    /**
     * Formulário de criação.
     */
    public function create()
    {
        $talents = TalentProfile::orderBy('nome_completo')
            ->get();


        return view(
            'mythra.talent.evolutions.create',
            compact('talents')
        );
    }


    /**
     * Registrar evolução.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'talent_profile_id' => [
                'required',
                'exists:talent_profiles,id'
            ],

            'competencia' => [
                'required',
                'string',
                'max:255'
            ],

            'nivel_anterior' => [
                'nullable',
                'string',
                'max:255'
            ],

            'nivel_atual' => [
                'nullable',
                'string',
                'max:255'
            ],

            'observacao' => [
                'nullable',
                'string'
            ],

        ]);


        TalentEvolution::create($validated);


        return redirect()
            ->route('talent.evolutions.index')
            ->with(
                'success',
                'Evolução registrada com sucesso.'
            );
    }


    /**
     * Exibir evolução.
     */
    public function show(TalentEvolution $talentEvolution)
    {
        $talentEvolution->load('talentProfile');


        return view(
            'mythra.talent.evolutions.show',
            compact('talentEvolution')
        );
    }


    /**
     * Atualizar evolução.
     */
    public function update(
        Request $request,
        TalentEvolution $talentEvolution
    )
    {
        $validated = $request->validate([

            'competencia' => [
                'required',
                'string',
                'max:255'
            ],

            'nivel_anterior' => [
                'nullable',
                'string',
                'max:255'
            ],

            'nivel_atual' => [
                'nullable',
                'string',
                'max:255'
            ],

            'observacao' => [
                'nullable',
                'string'
            ],

        ]);


        $talentEvolution->update($validated);


        return redirect()
            ->route(
                'talent.evolutions.show',
                $talentEvolution
            )
            ->with(
                'success',
                'Evolução atualizada com sucesso.'
            );
    }


    /**
     * Remover evolução.
     */
    public function destroy(TalentEvolution $talentEvolution)
    {
        $talentEvolution->delete();


        return redirect()
            ->route('talent.evolutions.index')
            ->with(
                'success',
                'Evolução removida com sucesso.'
            );
    }
}