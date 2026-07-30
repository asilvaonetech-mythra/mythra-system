@extends('mythra.talent.layout')

@section('title', 'Novo Currículo')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.curriculums.store') }}"
>

    @csrf

    <div class="talent-introduction">

        <h2>

            Cadastro de Currículo

        </h2>

        <div class="form-grid">

            <div class="form-group">

                <label>

                    Talento

                </label>

                <select
                    name="talent_profile_id"
                    required
                >

                    <option value="">

                        Selecione

                    </option>

                    @foreach($profiles as $profile)

                        <option
                            value="{{ $profile->id }}"
                            @selected(old('talent_profile_id') == $profile->id)
                        >

                            {{ $profile->nome_completo }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>

                    Resumo Profissional

                </label>

                <textarea
                    name="resumo"
                    rows="5"
                >{{ old('resumo') }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Formação

                </label>

                <textarea
                    name="formacao"
                    rows="5"
                >{{ old('formacao') }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Experiências

                </label>

                <textarea
                    name="experiencias"
                    rows="6"
                >{{ old('experiencias') }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Idiomas

                </label>

                <textarea
                    name="idiomas"
                    rows="4"
                >{{ old('idiomas') }}</textarea>

            </div>

        </div>

        <div class="domain-actions">

            <button
                type="submit"
                class="btn-mythra"
            >

                Salvar Currículo

            </button>

            <a
                href="{{ route('talent.curriculums.index') }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection