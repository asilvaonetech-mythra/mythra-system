@extends('mythra.talent.layout')

@section('title', 'Currículos')

@section('talent-content')

<div class="domain-actions">

    <a
        href="{{ route('talent.curriculums.create') }}"
        class="btn-mythra"
    >
        Novo Currículo
    </a>

</div>

<table class="table-domain">

    <thead>

        <tr>

            <th>Talento</th>

            <th>Status</th>

            <th>Atualizado</th>

            <th width="180">Ações</th>

        </tr>

    </thead>

    <tbody>

    @forelse($curriculums as $curriculum)

        <tr>

            <td>

                {{ $curriculum->talentProfile->nome_completo }}

            </td>

            <td>

                <span class="badge-status status-{{ strtolower($curriculum->status) }}">

                    {{ ucfirst($curriculum->status) }}

                </span>

            </td>

            <td>

                {{ $curriculum->updated_at->format('d/m/Y') }}

            </td>

            <td>

                <a
                    href="{{ route('talent.curriculums.show', $curriculum) }}"
                    class="btn-mythra"
                >
                    Abrir
                </a>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4">

                Nenhum currículo cadastrado.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div style="margin-top:30px;">

    {{ $curriculums->links() }}

</div>

@endsection