<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\TalentProfile;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Lista currículos.
     */
    public function index()
    {
        $curriculums = Curriculum::query()
            ->with('talentProfile')
            ->latest()
            ->paginate(20);

        return view(
            'mythra.talent.curriculums.index',
            compact('curriculums')
        );
    }

    /**
     * Formulário de criação.
     */
    public function create()
    {
        $profiles = TalentProfile::query()
            ->orderBy('nome_completo')
            ->get();

        return view(
            'mythra.talent.curriculums.create',
            compact('profiles')
        );
    }

    /**
     * Criar currículo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'talent_profile_id' => [
                'required',
                'exists:talent_profiles,id',
            ],

            'resumo' => [
                'nullable',
                'string',
            ],

            'formacao' => [
                'nullable',
                'string',
            ],

            'experiencias' => [
                'nullable',
                'string',
            ],

            'idiomas' => [
                'nullable',
                'string',
            ],

        ]);

        $validated['status'] = 'ativo';

        Curriculum::create($validated);

        return redirect()
            ->route('talent.curriculums.index')
            ->with(
                'success',
                'Currículo criado com sucesso.'
            );
    }

    /**
     * Exibir currículo.
     */
    public function show(Curriculum $curriculum)
    {
        $curriculum->load([
            'talentProfile',
        ]);

        return view(
            'mythra.talent.curriculums.show',
            compact('curriculum')
        );
    }

    /**
     * Editar currículo.
     */
    public function edit(Curriculum $curriculum)
    {
        $profiles = TalentProfile::query()
            ->orderBy('nome_completo')
            ->get();

        return view(
            'mythra.talent.curriculums.edit',
            compact(
                'curriculum',
                'profiles'
            )
        );
    }

    /**
     * Atualizar currículo.
     */
    public function update(
        Request $request,
        Curriculum $curriculum
    ) {
        $validated = $request->validate([

            'talent_profile_id' => [
                'required',
                'exists:talent_profiles,id',
            ],

            'resumo' => [
                'nullable',
                'string',
            ],

            'formacao' => [
                'nullable',
                'string',
            ],

            'experiencias' => [
                'nullable',
                'string',
            ],

            'idiomas' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'in:ativo,inativo',
            ],

        ]);

        $curriculum->update($validated);

        return redirect()
            ->route(
                'talent.curriculums.show',
                $curriculum
            )
            ->with(
                'success',
                'Currículo atualizado com sucesso.'
            );
    }

    /**
     * Remover currículo.
     */
    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();

        return redirect()
            ->route('talent.curriculums.index')
            ->with(
                'success',
                'Currículo removido com sucesso.'
            );
    }
}