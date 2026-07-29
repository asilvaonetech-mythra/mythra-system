@extends('mythra.talent.layout')

@section('title', 'Editar Talento')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.profiles.update', $profile) }}"
>

    @csrf

    @method('PUT')

    <div class="talent-introduction">

        <h2>

            Editar Talento

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Nome Completo

                </label>

                <input
                    type="text"
                    name="nome_completo"
                    value="{{ old('nome_completo', $profile->nome_completo) }}"
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
                    value="{{ old('email', $profile->email) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Telefone

                </label>

                <input
                    type="text"
                    name="telefone"
                    value="{{ old('telefone', $profile->telefone) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Localização

                </label>

                <input
                    type="text"
                    name="localizacao"
                    value="{{ old('localizacao', $profile->localizacao) }}"
                >

            </div>

            <div class="form-group">

                <label>

                    Objetivo Profissional

                </label>

                <textarea
                    name="objetivo_profissional"
                    rows="5"
                >{{ old('objetivo_profissional', $profile->objetivo_profissional) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Status

                </label>

                <select name="status">

                    <option value="ativo" @selected($profile->status === 'ativo')>

                        Ativo

                    </option>

                    <option value="inativo" @selected($profile->status === 'inativo')>

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
                href="{{ route('talent.profiles.show', $profile) }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection