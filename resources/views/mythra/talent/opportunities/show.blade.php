@extends('mythra.talent.layout')

@section('title', $opportunity->titulo)

@section('talent-content')

<div class="talent-home">

    <div class="talent-introduction">

        <h2>

            {{ $opportunity->titulo }}

        </h2>

        <p>

            Informações completas da oportunidade cadastrada no domínio Mythra Talent.

        </p>

    </div>

    <table class="table-domain">

        <tbody>

            <tr>

                <th width="220">

                    Título

                </th>

                <td>

                    {{ $opportunity->titulo }}

                </td>

            </tr>

            <tr>

                <th>

                    Organização

                </th>

                <td>

                    {{ $opportunity->organization->nome ?? '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Modelo de Trabalho

                </th>

                <td>

                    {{ ucfirst($opportunity->modelo_trabalho) }}

                </td>

            </tr>

            <tr>

                <th>

                    Localização

                </th>

                <td>

                    {{ $opportunity->localizacao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Nível

                </th>

                <td>

                    {{ ucfirst($opportunity->nivel) }}

                </td>

            </tr>

            <tr>

                <th>

                    Descrição

                </th>

                <td>

                    {{ $opportunity->descricao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Status

                </th>

                <td>

                    <span class="badge-status status-{{ strtolower($opportunity->status) }}">

                        {{ ucfirst($opportunity->status) }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>

                    Criado em

                </th>

                <td>

                    {{ $opportunity->created_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

            <tr>

                <th>

                    Atualizado em

                </th>

                <td>

                    {{ $opportunity->updated_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

        </tbody>

    </table>

    <div class="domain-actions">

        <a
            href="{{ route('talent.opportunities.edit', $opportunity) }}"
            class="btn-mythra"
        >

            Editar

        </a>

        <a
            href="{{ route('talent.opportunities.index') }}"
            class="btn-mythra"
        >

            Voltar

        </a>

    </div>

</div>

@endsection