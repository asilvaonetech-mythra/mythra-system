<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Content;
use App\Domains\Marketing\Requests\ContentRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function index(): View
    {
        $contents = Content::latest()->paginate(15);

        return view('marketing.contents.index', compact('contents'));
    }

    public function create(): View
    {
        return view('marketing.contents.create');
    }

    public function store(ContentRequest $request): RedirectResponse
    {
        Content::create($request->validated());

        return redirect()
            ->route('marketing.contents.index')
            ->with('success', 'Conteúdo criado com sucesso.');
    }

    public function show(Content $content): View
    {
        return view('marketing.contents.show', compact('content'));
    }

    public function edit(Content $content): View
    {
        return view('marketing.contents.edit', compact('content'));
    }

    public function update(
        ContentRequest $request,
        Content $content
    ): RedirectResponse {
        $content->update($request->validated());

        return redirect()
            ->route('marketing.contents.index')
            ->with('success', 'Conteúdo atualizado com sucesso.');
    }

    public function destroy(Content $content): RedirectResponse
    {
        $content->delete();

        return redirect()
            ->route('marketing.contents.index')
            ->with('success', 'Conteúdo removido com sucesso.');
    }

    public function publish(Content $content): RedirectResponse
    {
        $content->update([
            'status' => 'published',
        ]);

        return back()->with('success', 'Conteúdo publicado.');
    }
}