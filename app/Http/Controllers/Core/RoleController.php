<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Lista todas as Roles.
     */
    public function index()
    {
        $roles = Role::withCount('users')
            ->orderBy('display_name')
            ->paginate(20);

        return view('core.roles.index', compact('roles'));
    }


    /**
     * Formulário criar.
     */
    public function create()
    {
        $permissions = Permission::active()
            ->orderBy('module')
            ->get()
            ->groupBy('module');

        return view('core.roles.create', compact('permissions'));
    }


    /**
     * Salvar Role.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:roles,name'
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

            'color' => [
                'nullable',
                'string',
                'max:20'
            ],

            'permissions' => [
                'nullable',
                'array'
            ],

        ]);


        $role = Role::create([

            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'display_name' => $data['display_name'],
            'description' => $data['description'] ?? null,
            'color' => $data['color'] ?? '#8A2BE2',
            'is_system' => false,
            'is_active' => true,

        ]);


        if (!empty($data['permissions'])) {

            $role->permissions()
                ->sync($data['permissions']);

        }


        return redirect()
            ->route('core.roles.index')
            ->with('success', 'Role criada com sucesso.');
    }


    /**
     * Visualizar.
     */
    public function show(Role $role)
    {
        $role->load('permissions', 'users');

        return view('core.roles.show', compact('role'));
    }


    /**
     * Editar.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::active()
            ->orderBy('module')
            ->get()
            ->groupBy('module');


        return view(
            'core.roles.edit',
            compact(
                'role',
                'permissions'
            )
        );
    }


    /**
     * Atualizar.
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([

            'display_name' => [
                'required',
                'string',
                'max:150'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'color' => [
                'nullable',
                'string',
                'max:20'
            ],

            'permissions' => [
                'nullable',
                'array'
            ],

        ]);


        $role->update([

            'display_name' => $data['display_name'],
            'description' => $data['description'] ?? null,
            'color' => $data['color'] ?? $role->color,

        ]);


        $role->permissions()
            ->sync($data['permissions'] ?? []);


        return redirect()
            ->route('core.roles.index')
            ->with('success', 'Role atualizada.');
    }


    /**
     * Excluir.
     */
    public function destroy(Role $role)
    {
        if ($role->is_system) {

            return back()
                ->with(
                    'error',
                    'Roles do sistema não podem ser removidas.'
                );

        }


        $role->delete();


        return redirect()
            ->route('core.roles.index')
            ->with('success', 'Role removida.');
    }
}