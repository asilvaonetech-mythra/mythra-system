@extends('mythra.talent.layout')

@section('title', $skill->nome)

@section('talent-content')

<div class="talent-home">

    <div class="talent-introduction">

        <h2>

            {{ $skill->nome }}

        </h2>

        <p>

            Competência cadastrada no domínio Mythra Talent.

        </p>

    </div>

    <table class="table-domain">

        <tbody>

            <tr>

                <th width="220">

                    Nome

                </th>

                <td>

                    {{ $skill->nome }}

                </td>

            </tr>

            <tr>

                <th>

                    Categoria

                </th>

                <td>

                    {{ $skill->categoria ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Descrição

                </th>

                <td>

                    {{ $skill->descricao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Status

                </th>

                <td>

                    <span class="badge-status status-{{ strtolower($skill->status) }}">

                        {{ ucfirst($skill->status) }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>

                    Talentos Vinculados

                </th>

                <td>

                    {{ $skill->talentSkills->count() }}

                </td>

            </tr>

            <tr>

                <th>

                    Oportunidades Vinculadas

                </th>

                <td>

                    {{ $skill->opportunitySkills->count() }}

                </td>

            </tr>

            <tr>

                <th>

                    Criado em

                </th>

                <td>

                    {{ $skill->created_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

            <tr>

                <th>

                    Atualizado em

                </th>

                <td>

                    {{ $skill->updated_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

        </tbody>

    </table>

    <div class="domain-actions">

        <a
            href="{{ route('talent.skills.edit', $skill) }}"
            class="btn-mythra"
        >

            Editar

        </a>

        <a
            href="{{ route('talent.skills.index') }}"
            class="btn-mythra"
        >

            Voltar

        </a>

    </div>

</div>

@endsection