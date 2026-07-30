<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Lista competências.
     */
    public function index()
    {
        $skills = Skill::query()
            ->latest()
            ->paginate(20);

        return view(
            'mythra.talent.skills.index',
            compact('skills')
        );
    }

    /**
     * Formulário de criação.
     */
    public function create()
    {
        return view(
            'mythra.talent.skills.create'
        );
    }

    /**
     * Criar competência.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'categoria' => [
                'nullable',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

        ]);

        $validated['status'] = 'ativo';

        Skill::create($validated);

        return redirect()
            ->route('talent.skills.index')
            ->with(
                'success',
                'Competência criada com sucesso.'
            );
    }

    /**
     * Exibir competência.
     */
    public function show(Skill $skill)
    {
        $skill->load([
            'talentSkills.talentProfile',
            'opportunitySkills.opportunity',
        ]);

        return view(
            'mythra.talent.skills.show',
            compact('skill')
        );
    }

    /**
     * Editar competência.
     */
    public function edit(Skill $skill)
    {
        return view(
            'mythra.talent.skills.edit',
            compact('skill')
        );
    }

    /**
     * Atualizar competência.
     */
    public function update(
        Request $request,
        Skill $skill
    ) {
        $validated = $request->validate([

            'nome' => [
                'required',
                'string',
                'max:255',
            ],

            'categoria' => [
                'nullable',
                'string',
                'max:255',
            ],

            'descricao' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'in:ativo,inativo',
            ],

        ]);

        $skill->update($validated);

        return redirect()
            ->route(
                'talent.skills.show',
                $skill
            )
            ->with(
                'success',
                'Competência atualizada com sucesso.'
            );
    }

    /**
     * Remover competência.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('talent.skills.index')
            ->with(
                'success',
                'Competência removida com sucesso.'
            );
    }
}