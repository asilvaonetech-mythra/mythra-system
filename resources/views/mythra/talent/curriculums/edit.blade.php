@extends('mythra.talent.layout')

@section('title', 'Editar Currículo')

@section('talent-content')

<form
    method="POST"
    action="{{ route('talent.curriculums.update', $curriculum) }}"
>

    @csrf

    @method('PUT')

    <div class="talent-introduction">

        <h2>

            Editar Currículo

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

                    @foreach($profiles as $profile)

                        <option
                            value="{{ $profile->id }}"
                            @selected(old('talent_profile_id', $curriculum->talent_profile_id) == $profile->id)
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
                >{{ old('resumo', $curriculum->resumo) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Formação

                </label>

                <textarea
                    name="formacao"
                    rows="5"
                >{{ old('formacao', $curriculum->formacao) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Experiências

                </label>

                <textarea
                    name="experiencias"
                    rows="6"
                >{{ old('experiencias', $curriculum->experiencias) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Idiomas

                </label>

                <textarea
                    name="idiomas"
                    rows="4"
                >{{ old('idiomas', $curriculum->idiomas) }}</textarea>

            </div>

            <div class="form-group">

                <label>

                    Status

                </label>

                <select
                    name="status"
                    required
                >

                    <option
                        value="ativo"
                        @selected(old('status', $curriculum->status) == 'ativo')
                    >

                        Ativo

                    </option>

                    <option
                        value="inativo"
                        @selected(old('status', $curriculum->status) == 'inativo')
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
                href="{{ route('talent.curriculums.show', $curriculum) }}"
                class="btn-mythra"
            >

                Cancelar

            </a>

        </div>

    </div>

</form>

@endsection