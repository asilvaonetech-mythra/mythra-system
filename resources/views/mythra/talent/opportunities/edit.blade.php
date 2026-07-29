@extends('mythra.talent.layout')

@section('title', 'Editar Oportunidade')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.opportunities.update', $opportunity) }}"
>

    @csrf

    @method('PUT')

    <div class="talent-introduction">

        <h2>

            Editar Oportunidade

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

                    @foreach($organizations as $organization)

                        <option
                            value="{{ $organization->id }}"
                            @selected(old('organization_id', $opportunity->organization_id) == $organization->id)
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
                    value="{{ old('titulo', $opportunity->titulo) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>

                    Modelo de Trabalho

                </label>

                <select name="modelo_trabalho">

                    <option value="presencial" @selected($opportunity->modelo_trabalho == 'presencial')>

                        Presencial

                    </option>

                    <option value="hibrido" @selected($opportunity->modelo_trabalho == 'hibrido')>

                        Híbrido

                    </option>

                    <option value="remoto" @selected($opportunity->modelo_trabalho == 'remoto')>

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
                    value="{{ old('localizacao', $opportunity->localizacao) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Nível

                </label>

                <select name="nivel">

                    <option value="iniciante" @selected($opportunity->nivel == 'iniciante')>

                        Iniciante

                    </option>

                    <option value="intermediario" @selected($opportunity->nivel == 'intermediario')>

                        Intermediário

                    </option>

                    <option value="avancado" @selected($opportunity->nivel == 'avancado')>

                        Avançado

                    </option>

                    <option value="especialista" @selected($opportunity->nivel == 'especialista')>

                        Especialista

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>

                    Status

                </label>

                <select name="status">

                    <option value="aberta" @selected($opportunity->status == 'aberta')>

                        Aberta

                    </option>

                    <option value="pausada" @selected($opportunity->status == 'pausada')>

                        Pausada

                    </option>

                    <option value="encerrada" @selected($opportunity->status == 'encerrada')>

                        Encerrada

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
                >{{ old('descricao', $opportunity->descricao) }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Alterações

            </button>

            <a
                href="{{ route('talent.opportunities.show', $opportunity) }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection