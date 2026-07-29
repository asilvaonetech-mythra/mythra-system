@extends('mythra.talent.layout')

@section('title', 'Novo Talento')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.profiles.store') }}"
>

    @csrf

    <div class="talent-introduction">

        <h2>

            Cadastro de Talento

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Nome Completo

                </label>

                <input
                    type="text"
                    name="nome_completo"
                    value="{{ old('nome_completo') }}"
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

                    Localização

                </label>

                <input
                    type="text"
                    name="localizacao"
                    value="{{ old('localizacao') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Objetivo Profissional

                </label>

                <textarea
                    name="objetivo_profissional"
                    rows="5"
                >{{ old('objetivo_profissional') }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Talento

            </button>

            <a
                href="{{ route('talent.profiles.index') }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection