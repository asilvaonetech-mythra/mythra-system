@extends('layouts.mythra')

@section('title', 'Nova Publicação')

@section('content')

<div class="container">

    <h1>Nova Publicação</h1>


    <form method="POST" action="{{ route('marketing.publications.store') }}">

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
                Conteúdo
            </label>

            <textarea 
                name="content"
                required
            >{{ old('content') }}</textarea>
        </div>



        <div>
            <label>
                Status
            </label>

            <select name="status">

                <option value="draft">
                    Rascunho
                </option>

                <option value="published">
                    Publicado
                </option>

            </select>

        </div>



        <div>
            <label>
                Data de agendamento
            </label>

            <input
                type="datetime-local"
                name="scheduled_at"
                value="{{ old('scheduled_at') }}"
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

                    <option value="{{ $campaign->id }}">
                        {{ $campaign->name }}
                    </option>

                @endforeach

            </select>

        </div>



        <button type="submit">
            Salvar Publicação
        </button>


    </form>


</div>

@endsection