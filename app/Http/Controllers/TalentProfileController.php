<?php

namespace App\Http\Controllers;

use App\Models\TalentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalentProfileController extends Controller
{
    /**
     * Lista os perfis de talentos.
     */
    public function index()
    {
        $profiles = TalentProfile::with('user')
            ->latest()
            ->paginate(15);

        return view('mythra.talent.profiles.index', compact('profiles'));
    }


    /**
     * Exibe formulário de criação.
     */
    public function create()
    {
        return view('mythra.talent.profiles.create');
    }


    /**
     * Salva um novo perfil de talento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nome_completo' => [
                'required',
                'string',
                'max:255'
            ],

            'data_nascimento' => [
                'nullable',
                'date'
            ],

            'telefone' => [
                'nullable',
                'string',
                'max:50'
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255'
            ],

            'resumo_profissional' => [
                'nullable',
                'string'
            ],

            'objetivo_profissional' => [
                'nullable',
                'string'
            ],

            'disponibilidade' => [
                'nullable',
                'string',
                'max:255'
            ],

        ]);


        $validated['user_id'] = Auth::id();


        TalentProfile::create($validated);


        return redirect()
            ->route('talent.profiles.index')
            ->with('success', 'Perfil de talento criado com sucesso.');
    }


    /**
     * Exibe um perfil específico.
     */
    public function show(TalentProfile $talentProfile)
    {
        $talentProfile->load([
            'user',
            'resumes',
            'talentSkills.skill',
            'applications'
        ]);


        return view(
            'mythra.talent.profiles.show',
            compact('talentProfile')
        );
    }


    /**
     * Exibe edição.
     */
    public function edit(TalentProfile $talentProfile)
    {
        return view(
            'mythra.talent.profiles.edit',
            compact('talentProfile')
        );
    }


    /**
     * Atualiza perfil.
     */
    public function update(Request $request, TalentProfile $talentProfile)
    {
        $validated = $request->validate([

            'nome_completo' => [
                'required',
                'string',
                'max:255'
            ],

            'data_nascimento' => [
                'nullable',
                'date'
            ],

            'telefone' => [
                'nullable',
                'string',
                'max:50'
            ],

            'localizacao' => [
                'nullable',
                'string',
                'max:255'
            ],

            'resumo_profissional' => [
                'nullable',
                'string'
            ],

            'objetivo_profissional' => [
                'nullable',
                'string'
            ],

            'disponibilidade' => [
                'nullable',
                'string',
                'max:255'
            ],

        ]);


        $talentProfile->update($validated);


        return redirect()
            ->route('talent.profiles.show', $talentProfile)
            ->with('success', 'Perfil atualizado com sucesso.');
    }


    /**
     * Remove perfil.
     */
    public function destroy(TalentProfile $talentProfile)
    {
        $talentProfile->delete();


        return redirect()
            ->route('talent.profiles.index')
            ->with('success', 'Perfil removido com sucesso.');
    }
}