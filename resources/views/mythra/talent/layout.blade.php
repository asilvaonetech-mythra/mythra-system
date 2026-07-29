@extends('layouts.mythra')

@section('title', $title ?? 'Mythra Talent')

@section('content')

<div class="mythra-domain">

    <header class="domain-header">

        <div class="domain-symbol">
            ✦
        </div>

        <div class="domain-heading">

            <span class="domain-subtitle">
                Domínio Mythra
            </span>

            <h1 class="domain-title">
                {{ $title ?? 'Mythra Talent' }}
            </h1>

            <p class="domain-description">
                Conectando talentos, organizações e oportunidades através da
                Sabedoria Digital Mythra.
            </p>

        </div>

    </header>



    <nav class="domain-navigation">

        <a href="{{ route('talent.index') }}">
            Núcleo
        </a>

        <a href="{{ route('talent.profiles.index') }}">
            Talentos
        </a>

        <a href="{{ route('talent.organizations.index') }}">
            Organizações
        </a>

        <a href="{{ route('talent.opportunities.index') }}">
            Oportunidades
        </a>

        <a href="{{ route('talent.selection.index') }}">
            Processos
        </a>

        <a href="{{ route('talent.skills.index') }}">
            Competências
        </a>

        <a href="{{ route('talent.resumes.index') }}">
            Currículos
        </a>

    </nav>



    <section class="domain-content">

        @yield('talent-content')

    </section>

</div>

@endsection