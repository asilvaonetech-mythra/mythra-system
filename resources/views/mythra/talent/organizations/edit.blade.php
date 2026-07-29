@extends('mythra.talent.layout')

@section('title', 'Editar Organização')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.organizations.update', $organization) }}"
>

    @csrf

    @method('PUT')

    <div class="talent-introduction">

        <h2>

            Editar Organização

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Nome

                </label>

                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome', $organization->nome) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>

                    E-mail

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $organization->email) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Telefone

                </label>

                <input
                    type="text"
                    name="telefone"
                    value="{{ old('telefone', $organization->telefone) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Cidade

                </label>

                <input
                    type="text"
                    name="cidade"
                    value="{{ old('cidade', $organization->cidade) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Site

                </label>

                <input
                    type="url"
                    name="site"
                    value="{{ old('site', $organization->site) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Descrição

                </label>

                <textarea
                    name="descricao"
                    rows="5"
                >{{ old('descricao', $organization->descricao) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Status

                </label>

                <select name="status">

                    <option
                        value="ativo"
                        @selected($organization->status === 'ativo')
                    >

                        Ativo

                    </option>

                    <option
                        value="inativo"
                        @selected($organization->status === 'inativo')
                    >

                        Inativo

                    </option>

                </select>

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
                href="{{ route('talent.organizations.show', $organization) }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection