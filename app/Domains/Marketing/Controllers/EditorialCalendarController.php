<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\EditorialCalendar;
use App\Domains\Marketing\Requests\EditorialCalendarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EditorialCalendarController extends Controller
{
    public function index(): View
    {
        $calendars = EditorialCalendar::latest()->paginate(15);

        return view('marketing.editorial-calendars.index', compact('calendars'));
    }

    public function create(): View
    {
        return view('marketing.editorial-calendars.create');
    }

    public function store(EditorialCalendarRequest $request): RedirectResponse
    {
        EditorialCalendar::create($request->validated());

        return redirect()
            ->route('marketing.editorial-calendars.index')
            ->with('success', 'Calendário criado com sucesso.');
    }

    public function show(EditorialCalendar $editorialCalendar): View
    {
        return view(
            'marketing.editorial-calendars.show',
            compact('editorialCalendar')
        );
    }

    public function edit(EditorialCalendar $editorialCalendar): View
    {
        return view(
            'marketing.editorial-calendars.edit',
            compact('editorialCalendar')
        );
    }

    public function update(
        EditorialCalendarRequest $request,
        EditorialCalendar $editorialCalendar
    ): RedirectResponse {
        $editorialCalendar->update($request->validated());

        return redirect()
            ->route('marketing.editorial-calendars.index')
            ->with('success', 'Calendário atualizado com sucesso.');
    }

    public function destroy(
        EditorialCalendar $editorialCalendar
    ): RedirectResponse {
        $editorialCalendar->delete();

        return redirect()
            ->route('marketing.editorial-calendars.index')
            ->with('success', 'Calendário removido com sucesso.');
    }
}