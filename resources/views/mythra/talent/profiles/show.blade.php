@extends('mythra.talent.layout')

@section('title', $profile->nome_completo)

@section('talent-content')

<div class="talent-home">

    <div class="talent-introduction">

        <h2>

            {{ $profile->nome_completo }}

        </h2>

        <p>

            Perfil profissional registrado no domínio Mythra Talent.

        </p>

    </div>



    <table class="table-domain">

        <tbody>

            <tr>

                <th width="220">

                    Nome Completo

                </th>

                <td>

                    {{ $profile->nome_completo }}

                </td>

            </tr>

            <tr>

                <th>

                    E-mail

                </th>

                <td>

                    {{ $profile->email ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Telefone

                </th>

                <td>

                    {{ $profile->telefone ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Localização

                </th>

                <td>

                    {{ $profile->localizacao ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Objetivo Profissional

                </th>

                <td>

                    {{ $profile->objetivo_profissional ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Status

                </th>

                <td>

                    <span class="badge-status status-{{ strtolower($profile->status) }}">

                        {{ ucfirst($profile->status) }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>

                    Criado em

                </th>

                <td>

                    {{ $profile->created_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

            <tr>

                <th>

                    Atualizado em

                </th>

                <td>

                    {{ $profile->updated_at?->format('d/m/Y H:i') }}

                </td>

            </tr>

        </tbody>

    </table>



    <div class="domain-actions">

        <a
            href="{{ route('talent.profiles.edit', $profile) }}"
            class="btn-mythra"
        >

            Editar

        </a>



        <a
            href="{{ route('talent.profiles.index') }}"
            class="btn-mythra"
        >

            Voltar

        </a>

    </div>

</div>

@endsection