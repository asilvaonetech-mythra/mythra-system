<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Publication;
use App\Domains\Marketing\Requests\PublicationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function index(): View
    {
        $publications = Publication::latest()->paginate(15);

        return view('marketing.publications.index', compact('publications'));
    }

    public function create(): View
    {
        return view('marketing.publications.create');
    }

    public function store(
        PublicationRequest $request
    ): RedirectResponse {
        Publication::create($request->validated());

        return redirect()
            ->route('marketing.publications.index');
    }

    public function show(
        Publication $publication
    ): View {
        return view('marketing.publications.show', compact('publication'));
    }

    public function edit(
        Publication $publication
    ): View {
        return view('marketing.publications.edit', compact('publication'));
    }

    public function update(
        PublicationRequest $request,
        Publication $publication
    ): RedirectResponse {
        $publication->update($request->validated());

        return redirect()
            ->route('marketing.publications.index');
    }

    public function destroy(
        Publication $publication
    ): RedirectResponse {
        $publication->delete();

        return redirect()
            ->route('marketing.publications.index');
    }

    public function publish(
        Publication $publication
    ): RedirectResponse {
        $publication->update([
            'status' => 'published',
        ]);

        return back();
    }
}