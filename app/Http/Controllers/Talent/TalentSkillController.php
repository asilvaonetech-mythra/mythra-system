<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Talent\TalentSkill;
use App\Models\Talent\TalentProfile;
use App\Models\Talent\Skill;
use Illuminate\Http\Request;

class TalentSkillController extends Controller
{
    /**
     * Lista competências dos talentos.
     */
    public function index()
    {
        $talentSkills = TalentSkill::with([

                'talentProfile',

                'skill',

            ])
            ->latest()
            ->paginate(20);


        return view(
            'mythra.talent.talent-skills.index',
            compact('talentSkills')
        );
    }


    /**
     * Formulário de criação.
     */
    public function create()
    {
        $talents = TalentProfile::orderBy('nome_completo')
            ->get();


        $skills = Skill::where('status', 'ativo')
            ->orderBy('nome')
            ->get();


        return view(
            'mythra.talent.talent-skills.create',
            compact(
                'talents',
                'skills'
            )
        );
    }


    /**
     * Vincular competência ao talento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'talent_profile_id' => [
                'required',
                'exists:talent_profiles,id',
            ],

            'skill_id' => [
                'required',
                'exists:skills,id',
            ],

            'nivel' => [
                'required',
                'in:basico,intermediario,avancado,especialista',
            ],

            'anos_experiencia' => [
                'nullable',
                'integer',
            ],

        ]);


        TalentSkill::create($validated);


        return redirect()
            ->route('talent.talent-skills.index')
            ->with(
                'success',
                'Competência vinculada com sucesso.'
            );
    }


    /**
     * Visualizar competência.
     */
    public function show(
        TalentSkill $talentSkill
    ) {
        $talentSkill->load([

            'talentProfile',

            'skill',

        ]);


        return view(
            'mythra.talent.talent-skills.show',
            compact('talentSkill')
        );
    }


    /**
     * Editar competência.
     */
    public function edit(
        TalentSkill $talentSkill
    ) {
        $skills = Skill::where('status', 'ativo')
            ->orderBy('nome')
            ->get();


        return view(
            'mythra.talent.talent-skills.edit',
            compact(
                'talentSkill',
                'skills'
            )
        );
    }


    /**
     * Atualizar competência.
     */
    public function update(
        Request $request,
        TalentSkill $talentSkill
    ) {
        $validated = $request->validate([

            'nivel' => [
                'required',
                'in:basico,intermediario,avancado,especialista',
            ],

            'anos_experiencia' => [
                'nullable',
                'integer',
            ],

        ]);


        $talentSkill->update($validated);


        return redirect()
            ->route(
                'talent.talent-skills.index'
            )
            ->with(
                'success',
                'Competência atualizada com sucesso.'
            );
    }


    /**
     * Remover competência.
     */
    public function destroy(
        TalentSkill $talentSkill
    ) {
        $talentSkill->delete();


        return redirect()
            ->route('talent.talent-skills.index')
            ->with(
                'success',
                'Competência removida com sucesso.'
            );
    }
}