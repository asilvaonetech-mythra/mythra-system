<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Communication;
use App\Domains\Marketing\Requests\CommunicationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommunicationController extends Controller
{
    public function index(): View
    {
        $communications = Communication::latest()->paginate(15);

        return view(
            'marketing.communications.index',
            compact('communications')
        );
    }

    public function create(): View
    {
        return view('mythra.marketing.communications.create');
    }

    public function store(
        CommunicationRequest $request
    ): RedirectResponse {
        Communication::create($request->validated());

        return redirect()
            ->route('marketing.communications.index')
            ->with('success', 'Comunicação criada com sucesso.');
    }

    public function show(
        Communication $communication
    ): View {
        return view(
            'marketing.communications.show',
            compact('communication')
        );
    }

    public function edit(
        Communication $communication
    ): View {
        return view(
            'marketing.communications.edit',
            compact('communication')
        );
    }

    public function update(
        CommunicationRequest $request,
        Communication $communication
    ): RedirectResponse {
        $communication->update($request->validated());

        return redirect()
            ->route('marketing.communications.index')
            ->with('success', 'Comunicação atualizada com sucesso.');
    }

    public function destroy(
        Communication $communication
    ): RedirectResponse {
        $communication->delete();

        return redirect()
            ->route('marketing.communications.index')
            ->with('success', 'Comunicação removida com sucesso.');
    }

    public function send(
        Communication $communication
    ): RedirectResponse {

        // Implementação futura do envio.

        return back()->with(
            'success',
            'Comunicação enviada com sucesso.'
        );
    }
}
