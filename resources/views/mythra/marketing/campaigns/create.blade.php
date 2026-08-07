@extends('layouts.mythra')

@section('content')

<div class="container">

    <h1>Nova Campanha</h1>


    <form method="POST"
          action="{{ route('marketing.campaigns.store') }}">

        @csrf


        <div>
            <label>
                Nome
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
            >
        </div>


        <div>
            <label>
                Tipo
            </label>

            <input
                type="text"
                name="type"
                value="{{ old('type') }}"
            >
        </div>


        <div>
            <label>
                Descrição
            </label>

            <textarea name="description">{{ old('description') }}</textarea>
        </div>


        <div>
            <label>
                Objetivo
            </label>

            <textarea name="objective">{{ old('objective') }}</textarea>
        </div>


        <div>
            <label>
                Orçamento
            </label>

            <input
                type="number"
                step="0.01"
                name="budget"
                value="{{ old('budget') }}"
            >
        </div>


        <div>
            <label>
                Data inicial
            </label>

            <input
                type="date"
                name="starts_at"
                value="{{ old('starts_at') }}"
            >
        </div>


        <div>
            <label>
                Data final
            </label>

            <input
                type="date"
                name="ends_at"
                value="{{ old('ends_at') }}"
            >
        </div>


        <button type="submit">
            Salvar Campanha
        </button>


    </form>


</div>

@endsection