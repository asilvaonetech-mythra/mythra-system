@extends('layouts.mythra')

@section('title', 'Nova Mídia')

@section('content')

<div class="container">

    <h1>Nova Mídia Mythra</h1>


    <form method="POST" action="{{ route('marketing.assets.store', 'image') }}">

        @csrf


        <div>
            <label>
                Nome
            </label>

            <input 
                type="text"
                name="name"
                required
            >
        </div>


        <div>
            <label>
                Tipo
            </label>

            <select name="type">

                <option value="image">
                    Imagem
                </option>

                <option value="video">
                    Vídeo
                </option>

                <option value="audio">
                    Áudio
                </option>

            </select>

        </div>


        <div>
            <label>
                Categoria
            </label>

            <input
                type="text"
                name="category"
            >
        </div>


        <div>
            <label>
                Descrição
            </label>

            <textarea
                name="description"
            ></textarea>
        </div>


        <button type="submit">
            Salvar Mídia
        </button>


    </form>


</div>

@endsection