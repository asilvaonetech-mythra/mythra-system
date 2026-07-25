<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Lista configurações.
     */
    public function index()
    {
        $settings = Setting::orderBy('group')
            ->orderBy('sort_order')
            ->paginate(50);


        return view(
            'core.settings.index',
            compact('settings')
        );
    }



    /**
     * Formulário criação.
     */
    public function create()
    {
        return view(
            'core.settings.create'
        );
    }



    /**
     * Salvar configuração.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'group' => [
                'required',
                'string',
                'max:100'
            ],

            'key' => [
                'required',
                'string',
                'max:150',
                'unique:settings,key'
            ],

            'display_name' => [
                'required',
                'string',
                'max:150'
            ],

            'type' => [
                'required',
                'string',
                'max:50'
            ],

            'value' => [
                'nullable'
            ],

        ]);



        Setting::create([

            'group' => $data['group'],

            'key' => $data['key'],

            'display_name' => $data['display_name'],

            'type' => $data['type'],

            'value' => $data['value'] ?? null,

            'created_by' => Auth::id(),

            'is_active' => true,

        ]);



        return redirect()

            ->route('core.settings.index')

            ->with(
                'success',
                'Configuração criada com sucesso.'
            );
    }



    /**
     * Editar.
     */
    public function edit(Setting $setting)
    {
        return view(
            'core.settings.edit',
            compact('setting')
        );
    }



    /**
     * Atualizar.
     */
    public function update(
        Request $request,
        Setting $setting
    ) {

        $data = $request->validate([

            'display_name' => [
                'required',
                'string',
                'max:150'
            ],

            'value' => [
                'nullable'
            ],

            'type' => [
                'required',
                'string',
                'max:50'
            ],

        ]);



        $setting->update([

            'display_name' => $data['display_name'],

            'value' => $data['value'] ?? null,

            'type' => $data['type'],

            'updated_by' => Auth::id(),

        ]);



        app(\App\Services\SettingService::class)
            ->forget($setting->key);



        return redirect()

            ->route('core.settings.index')

            ->with(
                'success',
                'Configuração atualizada.'
            );
    }



    /**
     * Excluir.
     */
    public function destroy(Setting $setting)
    {
        if ($setting->is_system) {

            return back()

                ->with(
                    'error',
                    'Configurações do sistema não podem ser removidas.'
                );

        }



        $setting->delete();



        app(\App\Services\SettingService::class)
            ->forget($setting->key);



        return redirect()

            ->route('core.settings.index')

            ->with(
                'success',
                'Configuração removida.'
            );
    }
}