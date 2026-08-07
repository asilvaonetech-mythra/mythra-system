@extends('layouts.mythra')

@section('title', 'Rede Social')

@section('content')

<div class="container">

    <h1>{{ $socialNetwork->name }}</h1>

    <p>
        <strong>Provedor:</strong>
        {{ $socialNetwork->provider }}
    </p>

    <p>
        <strong>Usuário:</strong>
        {{ $socialNetwork->username ?? '-' }}
    </p>

    <p>
        <strong>URL:</strong>

        @if($socialNetwork->profile_url)
            <a href="{{ $socialNetwork->profile_url }}" target="_blank">
                {{ $socialNetwork->profile_url }}
            </a>
        @else
            -
        @endif

    </p>

    <p>
        <strong>Status:</strong>

        @if($socialNetwork->is_active)
            Ativa
        @else
            Inativa
        @endif

    </p>


    <a href="{{ route('marketing.social-networks.edit', $socialNetwork) }}">
        Editar
    </a>


    <form 
        method="POST"
        action="{{ route('marketing.social-networks.destroy', $socialNetwork) }}"
    >

        @csrf
        @method('DELETE')

        <button type="submit">
            Excluir
        </button>

    </form>


    <a href="{{ route('marketing.social-networks.index') }}">
        Voltar
    </a>


</div>

@endsection