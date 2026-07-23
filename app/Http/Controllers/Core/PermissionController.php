<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Lista permissões.
     */
    public function index()
    {
        $permissions = Permission::orderBy('module')
            ->orderBy('display_name')
            ->paginate(30);

        return view(
            'core.permissions.index',
            compact('permissions')
        );
    }


    /**
     * Formulário criação.
     */
    public function create()
    {
        return view(
            'core.permissions.create'
        );
    }


    /**
     * Salvar permissão.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:permissions,name'
            ],

            'module' => [
                'required',
                'string',
                'max:100'
            ],

            'display_name' => [
                'required',
                'string',
                'max:150'
            ],

            'description' => [
                'nullable',
                'string'
            ],

        ]);


        Permission::create([

            'name' => $data['name'],

            'slug' => Str::slug(
                $data['module']
                . '.'
                . $data['name']
            ),

            'module' => $data['module'],

            'display_name' => $data['display_name'],

            'description' =>
                $data['description'] ?? null,

            'is_system' => false,

            'is_active' => true,

        ]);


        return redirect()
            ->route('core.permissions.index')
            ->with(
                'success',
                'Permissão criada com sucesso.'
            );
    }


    /**
     * Exibir.
     */
    public function show(Permission $permission)
    {
        $permission->load('roles');

        return view(
            'core.permissions.show',
            compact('permission')
        );
    }


    /**
     * Editar.
     */
    public function edit(Permission $permission)
    {
        return view(
            'core.permissions.edit',
            compact('permission')
        );
    }


    /**
     * Atualizar.
     */
    public function update(
        Request $request,
        Permission $permission
    ) {

        $data = $request->validate([

            'display_name' => [
                'required',
                'string',
                'max:150'
            ],

            'module' => [
                'required',
                'string',
                'max:100'
            ],

            'description' => [
                'nullable',
                'string'
            ],

        ]);


        $permission->update([

            'display_name' =>
                $data['display_name'],

            'module' =>
                $data['module'],

            'description' =>
                $data['description'] ?? null,

        ]);


        return redirect()
            ->route('core.permissions.index')
            ->with(
                'success',
                'Permissão atualizada.'
            );
    }


    /**
     * Excluir.
     */
    public function destroy(Permission $permission)
    {
        if ($permission->is_system) {

            return back()
                ->with(
                    'error',
                    'Permissões do sistema não podem ser removidas.'
                );

        }


        $permission->delete();


        return redirect()
            ->route('core.permissions.index')
            ->with(
                'success',
                'Permissão removida.'
            );
    }
}