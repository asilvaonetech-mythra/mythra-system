@extends('mythra.talent.layout')

@section('title', 'Editar Competência')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.skills.update', $skill) }}"
>

    @csrf

    @method('PUT')

    <div class="talent-introduction">

        <h2>

            Editar Competência

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Nome

                </label>

                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome', $skill->nome) }}"
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
                    value="{{ old('categoria', $skill->categoria) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Status

                </label>

                <select name="status">

                    <option
                        value="ativo"
                        @selected(old('status', $skill->status) == 'ativo')
                    >

                        Ativo

                    </option>

                    <option
                        value="inativo"
                        @selected(old('status', $skill->status) == 'inativo')
                    >

                        Inativo

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>

                    Descrição

                </label>

                <textarea
                    name="descricao"
                    rows="8"
                >{{ old('descricao', $skill->descricao) }}</textarea>

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
                href="{{ route('talent.skills.show', $skill) }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection