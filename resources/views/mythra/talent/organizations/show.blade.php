@extends('mythra.talent.layout')

@section('title', $organization->nome)

@section('talent-content')

<div class="talent-home">

    <div class="talent-introduction">

        <h2>

            {{ $organization->nome }}

        </h2>

        <p>

            Informações da organização integrante do ecossistema Mythra.

        </p>

    </div>

    <table class="table-domain">

        <tbody>

            <tr>

                <th width="220">

                    Nome

                </th>

                <td>

                    {{ $organization->nome }}

                </td>

            </tr>

            <tr>

                <th>

                    E-mail

                </th>

                <td>

                    {{ $organization->email ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Telefone

                </th>

                <td>

                    {{ $organization->telefone ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Cidade

                </th>

                <td>

                    {{ $organization->cidade ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Site

                </th>

                <td>

                    {{ $organization->site ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Descrição

                </th>

                <td>

                    {{ $organization->descricao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Status

                </th>

                <td>

                    <span class="badge-status status-{{ strtolower($organization->status) }}">

                        {{ ucfirst($organization->status) }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>

                    Criado em

                </th>

                <td>

                    {{ $organization->created_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

            <tr>

                <th>

                    Atualizado em

                </th>

                <td>

                    {{ $organization->updated_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

        </tbody>

    </table>

    <div class="domain-actions">

        <a
            href="{{ route('talent.organizations.edit', $organization) }}"
            class="btn-mythra"
        >

            Editar

        </a>

        <a
            href="{{ route('talent.organizations.index') }}"
            class="btn-mythra"
        >

            Voltar

        </a>

    </div>

</div>

@endsection