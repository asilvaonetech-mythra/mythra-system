@extends('layouts.mythra')

@section('content')

<div class="container">

    <h1>
        Editar Campanha
    </h1>


    <form method="POST"
          action="{{ route('marketing.campaigns.update', $campaign) }}">

        @csrf
        @method('PUT')


        <div>

            <label>
                Nome
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $campaign->name) }}"
            >

        </div>


        <div>

            <label>
                Tipo
            </label>

            <input
                type="text"
                name="type"
                value="{{ old('type', $campaign->type) }}"
            >

        </div>


        <div>

            <label>
                Status
            </label>

            <input
                type="text"
                name="status"
                value="{{ old('status', $campaign->status) }}"
            >

        </div>


        <div>

            <label>
                Descrição
            </label>

            <textarea name="description">{{ old('description', $campaign->description) }}</textarea>

        </div>


        <div>

            <label>
                Objetivo
            </label>

            <textarea name="objective">{{ old('objective', $campaign->objective) }}</textarea>

        </div>


        <div>

            <label>
                Orçamento
            </label>

            <input
                type="number"
                step="0.01"
                name="budget"
                value="{{ old('budget', $campaign->budget) }}"
            >

        </div>


        <div>

            <label>
                Data inicial
            </label>

            <input
                type="date"
                name="starts_at"
                value="{{ optional($campaign->starts_at)->format('Y-m-d') }}"
            >

        </div>


        <div>

            <label>
                Data final
            </label>

            <input
                type="date"
                name="ends_at"
                value="{{ optional($campaign->ends_at)->format('Y-m-d') }}"
            >

        </div>


        <button type="submit">
            Atualizar Campanha
        </button>


    </form>


</div>

@endsection