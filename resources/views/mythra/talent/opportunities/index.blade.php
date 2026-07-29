@extends('mythra.talent.layout')

@section('title', 'Oportunidades')

@section('talent-content')

<div class="domain-actions">

    <a
        href="{{ route('talent.opportunities.create') }}"
        class="btn-mythra"
    >
        Nova Oportunidade
    </a>

</div>

<table class="table-domain">

    <thead>

        <tr>

            <th>Título</th>

            <th>Organização</th>

            <th>Modelo</th>

            <th>Status</th>

            <th width="180">Ações</th>

        </tr>

    </thead>

    <tbody>

    @forelse($opportunities as $opportunity)

        <tr>

            <td>

                {{ $opportunity->titulo }}

            </td>

            <td>

                {{ $opportunity->organization->nome ?? '-' }}

            </td>

            <td>

                {{ ucfirst($opportunity->modelo_trabalho) }}

            </td>

            <td>

                <span class="badge-status status-{{ strtolower($opportunity->status) }}">

                    {{ ucfirst($opportunity->status) }}

                </span>

            </td>

            <td>

                <a
                    href="{{ route('talent.opportunities.show', $opportunity) }}"
                    class="btn-mythra"
                >
                    Abrir
                </a>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="5">

                Nenhuma oportunidade cadastrada.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div style="margin-top:30px;">

    {{ $opportunities->links() }}

</div>

@endsection