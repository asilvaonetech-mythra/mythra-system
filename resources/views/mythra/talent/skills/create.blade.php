@extends('mythra.talent.layout')

@section('title', 'Nova Competência')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.skills.store') }}"
>

    @csrf

    <div class="talent-introduction">

        <h2>

            Cadastro de Competência

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

                    Categoria

                </label>

                <input
                    type="text"
                    name="categoria"
                    value="{{ old('categoria') }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Descrição

                </label>

                <textarea
                    name="descricao"
                    rows="8"
                >{{ old('descricao') }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Competência

            </button>

            <a
                href="{{ route('talent.skills.index') }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection