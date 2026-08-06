<?php

namespace App\Domains\Marketing\Controllers;

use App\Http\Controllers\Controller;
use App\Domains\Marketing\Models\Brand;
use App\Domains\Marketing\Requests\BrandRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        $brands = Brand::latest()->paginate(15);

        return view('mythra.marketing.brands.index', compact('brands'));
    }

    public function create(): View
    {
        return view('mythra.marketing.brands.create');
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        Brand::create($request->validated());

        return redirect()
            ->route('marketing.brands.index')
            ->with('success', 'Marca criada com sucesso.');
    }

    public function show(Brand $brand): View
    {
        return view('mythra.marketing.brands.show', compact('brand'));
    }

    public function edit(Brand $brand): View
    {
        return view('mythra.marketing.brands.edit', compact('brand'));
    }

    public function update(
        BrandRequest $request,
        Brand $brand
    ): RedirectResponse {
        $brand->update($request->validated());

        return redirect()
            ->route('marketing.brands.index')
            ->with('success', 'Marca atualizada com sucesso.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()
            ->route('marketing.brands.index')
            ->with('success', 'Marca removida com sucesso.');
    }

    public function toggle(Brand $brand): RedirectResponse
    {
        $brand->update([
            'is_active' => ! $brand->is_active,
        ]);

        return back()->with(
            'success',
            'Status atualizado com sucesso.'
        );
    }
}
