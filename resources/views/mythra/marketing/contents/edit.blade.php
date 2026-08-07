@extends('layouts.mythra')

@section('title', 'Mythra Marketing - Editar Conteúdo')

@section('content')

<h1>Editar Conteúdo</h1>


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
    action="{{ route('marketing.contents.update', $content) }}"
    method="POST"
>

    @csrf

    @method('PUT')



    <div>

        <label>
            Título
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $content->title) }}"
            required
        >

    </div>



    <div>

        <label>
            Tipo
        </label>


        <select name="type" required>


            <option value="post"
                @selected(old('type', $content->type) === 'post')
            >
                Post
            </option>


            <option value="article"
                @selected(old('type', $content->type) === 'article')
            >
                Artigo
            </option>


            <option value="video"
                @selected(old('type', $content->type) === 'video')
            >
                Vídeo
            </option>


            <option value="audio"
                @selected(old('type', $content->type) === 'audio')
            >
                Áudio
            </option>


            <option value="social"
                @selected(old('type', $content->type) === 'social')
            >
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
            rows="10"
        >{{ old('body', $content->body) }}</textarea>


    </div>



    <div>

        <label>
            Autor
        </label>


        <input
            type="text"
            name="author"
            value="{{ old('author', $content->author) }}"
        >


    </div>



    <div>

        <label>
            Tags
        </label>


        <input
            type="text"
            name="tags[]"
            value="{{ old('tags.0', $content->tags[0] ?? '') }}"
            placeholder="marketing"
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
                    @selected(
                        old('campaign_id', $content->campaign_id) == $campaign->id
                    )
                >

                    {{ $campaign->name }}

                </option>


            @endforeach


        </select>


    </div>




    <div>

        <label>
            Status
        </label>


        <select name="status">


            <option
                value="draft"
                @selected(old('status', $content->status) === 'draft')
            >

                Rascunho

            </option>



            <option
                value="published"
                @selected(old('status', $content->status) === 'published')
            >

                Publicado

            </option>


        </select>


    </div>




    <button type="submit">

        Atualizar Conteúdo

    </button>


</form>


@endsection