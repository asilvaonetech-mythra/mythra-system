@extends('layouts.mythra')

@section('content')

<div class="container">

    <h1>
        {{ $campaign->name }}
    </h1>


    <div>
        <strong>Tipo:</strong>

        {{ $campaign->type }}
    </div>


    <div>
        <strong>Status:</strong>

        {{ $campaign->status }}
    </div>


    <div>
        <strong>Objetivo:</strong>

        {{ $campaign->objective }}
    </div>


    <div>
        <strong>Descrição:</strong>

        {{ $campaign->description }}
    </div>


    <div>
        <strong>Orçamento:</strong>

        R$ {{ number_format($campaign->budget, 2, ',', '.') }}
    </div>


    <div>
        <strong>Início:</strong>

        {{ optional($campaign->starts_at)->format('d/m/Y') }}
    </div>


    <div>
        <strong>Final:</strong>

        {{ optional($campaign->ends_at)->format('d/m/Y') }}
    </div>


    <div>
        <strong>Criado em:</strong>

        {{ $campaign->created_at->format('d/m/Y H:i') }}
    </div>


    <br>


    <a href="{{ route('marketing.campaigns.edit', $campaign) }}">
        Editar
    </a>


    <a href="{{ route('marketing.campaigns.index') }}">
        Voltar
    </a>


</div>

@endsection