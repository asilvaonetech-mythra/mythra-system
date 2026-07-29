<?php

namespace App\Http\Controllers;

use App\Models\SelectionProcess;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class SelectionProcessController extends Controller
{
    /**
     * Lista processos seletivos.
     */
    public function index()
    {
        $processes = SelectionProcess::with('opportunity')
            ->latest()
            ->paginate(15);


        return view(
            'mythra.talent.selection.index',
            compact('processes')
        );
    }


    /**
     * Formulário de criação.
     */
    public function create()
    {
        $opportunities = Opportunity::where('status', 'aberta')
            ->orderBy('titulo')
            ->get();


        return view(
            'mythra.talent.selection.create',
            compact('opportunities')
        );
    }


    /**
     * Criar processo seletivo.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'opportunity_id' => [
                'required',
                'exists:opportunities,id'
            ],

            'nome' => [
                'required',
                'string',
                'max:255'
            ],

            'descricao' => [
                'nullable',
                'string'
            ],

        ]);


        SelectionProcess::create($validated);


        return redirect()
            ->route('talent.selection.index')
            ->with(
                'success',
                'Processo seletivo criado com sucesso.'
            );
    }


    /**
     * Visualizar processo.
     */
    public function show(SelectionProcess $selectionProcess)
    {
        $selectionProcess->load([
            'opportunity.organization',
            'applications.talentProfile'
        ]);


        return view(
            'mythra.talent.selection.show',
            compact('selectionProcess')
        );
    }


    /**
     * Atualizar processo.
     */
    public function update(
        Request $request,
        SelectionProcess $selectionProcess
    )
    {
        $validated = $request->validate([

            'nome' => [
                'required',
                'string',
                'max:255'
            ],

            'descricao' => [
                'nullable',
                'string'
            ],

            'status' => [
                'nullable',
                'in:aberto,em_andamento,finalizado,cancelado'
            ],

        ]);


        $selectionProcess->update($validated);


        return redirect()
            ->route(
                'talent.selection.show',
                $selectionProcess
            )
            ->with(
                'success',
                'Processo atualizado com sucesso.'
            );
    }


    /**
     * Remover processo.
     */
    public function destroy(SelectionProcess $selectionProcess)
    {
        $selectionProcess->delete();


        return redirect()
            ->route('talent.selection.index')
            ->with(
                'success',
                'Processo removido com sucesso.'
            );
    }
}