<?php

namespace App\Http\Controllers;

use App\Services\Mythra\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected ModuleService $modules;

    public function __construct(ModuleService $modules)
    {
        $this->modules = $modules;
    }

    /**
     * Lista todos os módulos.
     */
    public function index()
    {
        return view('modules.index', [
            'modules' => $this->modules->ordered()
        ]);
    }

    /**
     * Exibe um módulo.
     */
    public function show(string $module)
    {
        $data = $this->modules->find($module);

        if (!$data) {
            abort(404);
        }

        return view('modules.show', [
            'module' => $data
        ]);
    }

    /**
     * Pesquisa módulos.
     */
    public function search(Request $request)
    {
        $term = $request->input('q', '');

        return response()->json(
            $this->modules->search($term)
        );
    }

    /**
     * Retorna todos os módulos em JSON.
     */
    public function api()
    {
        return response()->json(
            $this->modules->all()
        );
    }
}