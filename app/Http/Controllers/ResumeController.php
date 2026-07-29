<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\TalentProfile;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Lista currículos.
     */
    public function index()
    {
        $resumes = Resume::with('talentProfile')
            ->latest()
            ->paginate(20);


        return view(
            'mythra.talent.resumes.index',
            compact('resumes')
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
            'mythra.talent.resumes.create',
            compact('talents')
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
                'exists:talent_profiles,id'
            ],

            'titulo' => [
                'required',
                'string',
                'max:255'
            ],

            'resumo' => [
                'nullable',
                'string'
            ],

            'experiencias_texto' => [
                'nullable',
                'string'
            ],

            'formacao_texto' => [
                'nullable',
                'string'
            ],

            'certificacoes_texto' => [
                'nullable',
                'string'
            ],

            'projetos_texto' => [
                'nullable',
                'string'
            ],

            'principal' => [
                'nullable',
                'boolean'
            ],

        ]);


        Resume::create($validated);


        return redirect()
            ->route('talent.resumes.index')
            ->with(
                'success',
                'Currículo criado com sucesso.'
            );
    }


    /**
     * Visualizar currículo.
     */
    public function show(Resume $resume)
    {
        $resume->load('talentProfile');


        return view(
            'mythra.talent.resumes.show',
            compact('resume')
        );
    }


    /**
     * Editar currículo.
     */
    public function edit(Resume $resume)
    {
        return view(
            'mythra.talent.resumes.edit',
            compact('resume')
        );
    }


    /**
     * Atualizar currículo.
     */
    public function update(
        Request $request,
        Resume $resume
    )
    {
        $validated = $request->validate([

            'titulo' => [
                'required',
                'string',
                'max:255'
            ],

            'resumo' => [
                'nullable',
                'string'
            ],

            'experiencias_texto' => [
                'nullable',
                'string'
            ],

            'formacao_texto' => [
                'nullable',
                'string'
            ],

            'certificacoes_texto' => [
                'nullable',
                'string'
            ],

            'projetos_texto' => [
                'nullable',
                'string'
            ],

            'principal' => [
                'nullable',
                'boolean'
            ],

        ]);


        $resume->update($validated);


        return redirect()
            ->route(
                'talent.resumes.show',
                $resume
            )
            ->with(
                'success',
                'Currículo atualizado com sucesso.'
            );
    }


    /**
     * Remover currículo.
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();


        return redirect()
            ->route('talent.resumes.index')
            ->with(
                'success',
                'Currículo removido com sucesso.'
            );
    }
}