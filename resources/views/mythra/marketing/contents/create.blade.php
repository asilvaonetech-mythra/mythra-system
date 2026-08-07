@extends('layouts.mythra')

@section('title', 'Mythra Marketing - Novo Conteúdo')

@section('content')

<div class="module-container">

    <h1>Novo Conteúdo</h1>


    @if($errors->any())

        <div>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <form
        action="{{ route('marketing.contents.store') }}"
        method="POST"
    >

        @csrf


        <div>

            <label>
                Título
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                required
            >

        </div>



        <div>

            <label>
                Tipo
            </label>

            <select name="type" required>

                <option value="">
                    Selecione
                </option>

                <option value="post">
                    Post
                </option>

                <option value="article">
                    Artigo
                </option>

                <option value="video">
                    Vídeo
                </option>

                <option value="audio">
                    Áudio
                </option>

                <option value="social">
                    Social
                </option>

            </select>

        </div>



        <div>

            <label>
                Conteúdo
            </label>

            <textarea
                name="body"
                rows="8"
            >{{ old('body') }}</textarea>

        </div>



        <div>

            <label>
                Autor
            </label>

            <input
                type="text"
                name="author"
                value="{{ old('author') }}"
            >

        </div>



        <div>

            <label>
                Tags
            </label>

            <input
                type="text"
                name="tags[]"
                placeholder="marketing, mythra, lançamento"
            >

        </div>



        <div>

            <label>
                Campanha
            </label>

            <select name="campaign_id">

                <option value="">
                    Sem campanha
                </option>


                @foreach(\App\Domains\Marketing\Models\Campaign::all() as $campaign)

                    <option
                        value="{{ $campaign->id }}"
                    >

                        {{ $campaign->name }}

                    </option>

                @endforeach


            </select>

        </div>



        <input
            type="hidden"
            name="status"
            value="draft"
        >



        <button type="submit">
            Salvar Conteúdo
        </button>


    </form>


</div>

@endsection