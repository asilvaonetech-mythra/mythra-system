@extends('mythra.talent.layout')

@section('title', 'Nova Oportunidade')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.opportunities.store') }}"
>

    @csrf

    <div class="talent-introduction">

        <h2>

            Cadastro de Oportunidade

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Organização

                </label>

                <select
                    name="organization_id"
                    required
                >

                    <option value="">

                        Selecione

                    </option>

                    @foreach($organizations as $organization)

                        <option
                            value="{{ $organization->id }}"
                            @selected(old('organization_id') == $organization->id)
                        >

                            {{ $organization->nome }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>

                    Título

                </label>

                <input
                    type="text"
                    name="titulo"
                    value="{{ old('titulo') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>

                    Modelo de Trabalho

                </label>

                <select name="modelo_trabalho">

                    <option value="presencial">

                        Presencial

                    </option>

                    <option value="hibrido">

                        Híbrido

                    </option>

                    <option value="remoto">

                        Remoto

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>

                    Localização

                </label>

                <input
                    type="text"
                    name="localizacao"
                    value="{{ old('localizacao') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Nível

                </label>

                <select name="nivel">

                    <option value="iniciante">

                        Iniciante

                    </option>

                    <option value="intermediario">

                        Intermediário

                    </option>

                    <option value="avancado">

                        Avançado

                    </option>

                    <option value="especialista">

                        Especialista

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>

                    Descrição

                </label>

                <textarea
                    name="descricao"
                    rows="8"
                >{{ old('descricao') }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Oportunidade

            </button>

            <a
                href="{{ route('talent.opportunities.index') }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection