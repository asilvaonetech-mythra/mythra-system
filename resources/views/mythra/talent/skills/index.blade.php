@extends('mythra.talent.layout')

@section('title', 'Competências')

@section('talent-content')

<div class="domain-actions">

    <a
        href="{{ route('talent.skills.create') }}"
        class="btn-mythra"
    >
        Nova Competência
    </a>

</div>

<table class="table-domain">

    <thead>

        <tr>

            <th>Competência</th>

            <th>Categoria</th>

            <th>Status</th>

            <th width="200">Relacionamentos</th>

            <th width="180">Ações</th>

        </tr>

    </thead>

    <tbody>

    @forelse($skills as $skill)

        <tr>

            <td>

                {{ $skill->nome }}

            </td>

            <td>

                {{ $skill->categoria ?: '-' }}

            </td>

            <td>

                <span class="badge-status status-{{ strtolower($skill->status) }}">

                    {{ ucfirst($skill->status) }}

                </span>

            </td>

            <td>

                <strong>

                    {{ $skill->talentSkills()->count() }}

                </strong>

                Talentos

                <br>

                <strong>

                    {{ $skill->opportunitySkills()->count() }}

                </strong>

                Oportunidades

            </td>

            <td>

                <div style="display:flex;gap:8px;flex-wrap:wrap;">

                    <a
                        href="{{ route('talent.skills.show', $skill) }}"
                        class="btn-mythra"
                    >
                        Abrir
                    </a>

                    <a
                        href="{{ route('talent.skills.edit', $skill) }}"
                        class="btn-mythra"
                    >
                        Editar
                    </a>

                </div>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="5">

                Nenhuma competência cadastrada.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div style="margin-top:30px;">

    {{ $skills->links() }}

</div>

@endsection