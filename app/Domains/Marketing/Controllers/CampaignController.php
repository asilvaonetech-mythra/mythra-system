<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Campaign;
use App\Domains\Marketing\Requests\CampaignRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CampaignController extends Controller
{
    public function index(): View
    {
        $campaigns = Campaign::latest()->paginate(15);

        return view('mythra.marketing.campaigns.index', compact('campaigns'));
    }

    public function create(): View
    {
        return view('mythra.marketing.campaigns.create');
    }

    public function store(CampaignRequest $request): RedirectResponse
    {
        Campaign::create($request->validated());

        return redirect()
            ->route('marketing.campaigns.index')
            ->with('success', 'Campanha criada com sucesso.');
    }

    public function show(Campaign $campaign): View
    {
        return view('mythra.marketing.campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign): View
    {
        return view('mythra.marketing.campaigns.edit', compact('campaign'));
    }

    public function update(
        CampaignRequest $request,
        Campaign $campaign
    ): RedirectResponse {
        $campaign->update($request->validated());

        return redirect()
            ->route('marketing.campaigns.index')
            ->with('success', 'Campanha atualizada com sucesso.');
    }

    public function destroy(Campaign $campaign): RedirectResponse
    {
        $campaign->delete();

        return redirect()
            ->route('marketing.campaigns.index')
            ->with('success', 'Campanha removida com sucesso.');
    }
}
