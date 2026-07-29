@extends('mythra.talent.layout')

@section('title', 'Nova Organização')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.organizations.store') }}"
>

    @csrf

    <div class="talent-introduction">

        <h2>

            Cadastro de Organização

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Nome

                </label>

                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome') }}"
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
                    value="{{ old('email') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Telefone

                </label>

                <input
                    type="text"
                    name="telefone"
                    value="{{ old('telefone') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Cidade

                </label>

                <input
                    type="text"
                    name="cidade"
                    value="{{ old('cidade') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Site

                </label>

                <input
                    type="url"
                    name="site"
                    value="{{ old('site') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Descrição

                </label>

                <textarea
                    name="descricao"
                    rows="5"
                >{{ old('descricao') }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Organização

            </button>

            <a
                href="{{ route('talent.organizations.index') }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection