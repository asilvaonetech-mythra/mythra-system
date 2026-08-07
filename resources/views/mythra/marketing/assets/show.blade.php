@extends('layouts.module')

@section('title', 'Detalhes da Mídia Mythra')

@section('content')

<div class="container">

    <h1>{{ $asset->name }}</h1>

    <p>
        <strong>Categoria:</strong>
        {{ $asset->category ?? 'Sem categoria' }}
    </p>


    <p>
        <strong>Descrição:</strong>
        {{ $asset->description ?? 'Sem descrição' }}
    </p>


    <p>
        <strong>Arquivo:</strong>
        {{ $asset->file_path }}
    </p>


    <a href="{{ route('marketing.assets.index') }}">
        Voltar
    </a>

</div>

@endsection