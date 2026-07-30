@extends('mythra.talent.layout')

@section('title', 'Currículo')

@section('talent-content')

<div class="talent-home">

    <div class="talent-introduction">

        <h2>

            {{ $curriculum->talentProfile->nome_completo }}

        </h2>

        <p>

            Currículo profissional registrado no Mythra Talent.

        </p>

    </div>

    <table class="table-domain">

        <tbody>

            <tr>

                <th width="220">

                    Talento

                </th>

                <td>

                    {{ $curriculum->talentProfile->nome_completo }}

                </td>

            </tr>

            <tr>

                <th>

                    Resumo

                </th>

                <td>

                    {{ $curriculum->resumo ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Formação

                </th>

                <td>

                    {{ $curriculum->formacao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Experiências

                </th>

                <td>

                    {{ $curriculum->experiencias ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Idiomas

                </th>

                <td>

                    {{ $curriculum->idiomas ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Status

                </th>

                <td>

                    <span class="badge-status status-{{ strtolower($curriculum->status) }}">

                        {{ ucfirst($curriculum->status) }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>

                    Criado em

                </th>

                <td>

                    {{ $curriculum->created_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

            <tr>

                <th>

                    Atualizado em

                </th>

                <td>

                    {{ $curriculum->updated_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

        </tbody>

    </table>

    <div class="domain-actions">

        <a
            href="{{ route('talent.curriculums.edit', $curriculum) }}"
            class="btn-mythra"
        >

            Editar

        </a>

        <a
            href="{{ route('talent.curriculums.index') }}"
            class="btn-mythra"
        >

            Voltar

        </a>

    </div>

</div>

@endsection