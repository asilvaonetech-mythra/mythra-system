<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Automation;
use App\Domains\Marketing\Requests\AutomationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AutomationController extends Controller
{
    public function index(): View
    {
        $automations = Automation::latest()->paginate(15);

        return view(
            'marketing.automations.index',
            compact('automations')
        );
    }

    public function create(): View
    {
        return view('marketing.automations.create');
    }

    public function store(
        AutomationRequest $request
    ): RedirectResponse {
        Automation::create($request->validated());

        return redirect()
            ->route('marketing.automations.index')
            ->with('success', 'Automação criada com sucesso.');
    }

    public function show(
        Automation $automation
    ): View {
        return view(
            'marketing.automations.show',
            compact('automation')
        );
    }

    public function edit(
        Automation $automation
    ): View {
        return view(
            'marketing.automations.edit',
            compact('automation')
        );
    }

    public function update(
        AutomationRequest $request,
        Automation $automation
    ): RedirectResponse {
        $automation->update($request->validated());

        return redirect()
            ->route('marketing.automations.index')
            ->with('success', 'Automação atualizada com sucesso.');
    }

    public function destroy(
        Automation $automation
    ): RedirectResponse {
        $automation->delete();

        return redirect()
            ->route('marketing.automations.index')
            ->with('success', 'Automação removida com sucesso.');
    }

    public function execute(
        Automation $automation
    ): RedirectResponse {

        // Implementação futura.

        return back()->with(
            'success',
            'Automação executada com sucesso.'
        );
    }

    public function toggle(
        Automation $automation
    ): RedirectResponse {

        $automation->update([
            'is_active' => ! $automation->is_active,
        ]);

        return back()->with(
            'success',
            'Status atualizado com sucesso.'
        );
    }
}