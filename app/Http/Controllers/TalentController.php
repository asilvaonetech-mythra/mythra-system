<?php

namespace App\Http\Controllers;

use App\Models\TalentProfile;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    /**
     * Entrada principal do domínio Talent.
     */
    public function index()
    {
        $talents = TalentProfile::with([
                'user',
                'talentSkills.skill'
            ])
            ->latest()
            ->paginate(20);


        return view(
            'mythra.talent.index',
            compact('talents')
        );
    }


    /**
     * Visualização resumida do talento.
     */
    public function show(TalentProfile $talentProfile)
    {
        $talentProfile->load([
            'user',
            'resumes',
            'talentSkills.skill',
            'applications.opportunity.organization',
            'evolutions'
        ]);


        return view(
            'mythra.talent.show',
            compact('talentProfile')
        );
    }


    /**
     * Busca inteligente inicial de talentos.
     */
    public function search(Request $request)
    {
        $query = TalentProfile::query()
            ->with([
                'talentSkills.skill'
            ]);


        if ($request->filled('competencia')) {

            $query->whereHas(
                'talentSkills.skill',
                function ($skillQuery) use ($request) {

                    $skillQuery->where(
                        'nome',
                        'like',
                        '%' . $request->competencia . '%'
                    );

                }
            );

        }


        if ($request->filled('localizacao')) {

            $query->where(
                'localizacao',
                'like',
                '%' . $request->localizacao . '%'
            );

        }


        $talents = $query
            ->latest()
            ->paginate(20);


        return view(
            'mythra.talent.search',
            compact('talents')
        );
    }
}