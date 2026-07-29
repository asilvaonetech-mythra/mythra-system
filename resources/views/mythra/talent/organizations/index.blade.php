@extends('mythra.talent.layout')

@section('title', 'Organizações')

@section('talent-content')

<div class="domain-actions">

    <a
        href="{{ route('talent.organizations.create') }}"
        class="btn-mythra"
    >
        Nova Organização
    </a>

</div>

<table class="table-domain">

    <thead>

        <tr>

            <th>Organização</th>

            <th>Contato</th>

            <th>Cidade</th>

            <th>Status</th>

            <th width="180">Ações</th>

        </tr>

    </thead>

    <tbody>

    @forelse($organizations as $organization)

        <tr>

            <td>

                {{ $organization->nome }}

            </td>

            <td>

                {{ $organization->email }}

            </td>

            <td>

                {{ $organization->cidade }}

            </td>

            <td>

                <span class="badge-status status-{{ strtolower($organization->status) }}">

                    {{ ucfirst($organization->status) }}

                </span>

            </td>

            <td>

                <a
                    href="{{ route('talent.organizations.show', $organization) }}"
                    class="btn-mythra"
                >
                    Abrir
                </a>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="5">

                Nenhuma organização cadastrada.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div style="margin-top:30px;">

    {{ $organizations->links() }}

</div>

@endsection