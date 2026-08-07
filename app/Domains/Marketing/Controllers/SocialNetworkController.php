<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\SocialNetwork;
use App\Domains\Marketing\Requests\SocialNetworkRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SocialNetworkController extends Controller
{
    public function index(): View
    {
        $socialNetworks = SocialNetwork::paginate(15);

        return view('mythra.marketing.social-networks.index', compact('socialNetworks'));
    }

    public function create(): View
    {
        return view('mythra.marketing.social-networks.create');
    }

    public function store(SocialNetworkRequest $request): RedirectResponse
    {
        SocialNetwork::create($request->validated());

        return redirect()
            ->route('marketing.social-networks.index');
    }

    public function show(SocialNetwork $socialNetwork): View
    {
        return view('mythra.marketing.social-networks.show', compact('socialNetwork'));
    }

    public function edit(SocialNetwork $socialNetwork): View
    {
        return view('mythra.marketing.social-networks.edit', compact('socialNetwork'));
    }

    public function update(
        SocialNetworkRequest $request,
        SocialNetwork $socialNetwork
    ): RedirectResponse {
        $socialNetwork->update($request->validated());

        return redirect()
            ->route('marketing.social-networks.index');
    }

    public function destroy(
        SocialNetwork $socialNetwork
    ): RedirectResponse {
        $socialNetwork->delete();

        return redirect()
            ->route('marketing.social-networks.index');
    }

        public function toggle(
        SocialNetwork $socialNetwork
    ): RedirectResponse {

        $socialNetwork->update([
            'is_active' => ! $socialNetwork->is_active,
        ]);

        return back();
    }
}