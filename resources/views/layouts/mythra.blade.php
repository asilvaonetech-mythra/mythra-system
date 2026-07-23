<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title', 'Mythra')
    </title>



    {{-- Portal Mythra --}}
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/portal-orbs.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/portal-effects.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">

    {{-- Biblioteca e Domínios Mythra --}}
    <link rel="stylesheet" href="{{ asset('assets/css/modules.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/modules-library.css') }}">



    {{-- Atendentes Mythra --}}
    <link rel="stylesheet" href="{{ asset('assets/css/portal-agents.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/portal-assistant.css') }}">


</head>



<body>



<div id="mythra-universe">


    @include('components.background')



    <main id="mythra-main">

        @yield('content')

    </main>



</div>






{{-- Núcleo de Navegação Mythra --}}
<script src="{{ asset('assets/js/module-router.js') }}"></script>




{{-- Portal Mythra --}}
<script src="{{ asset('assets/js/portal.js') }}"></script>

<script src="{{ asset('assets/js/portal-orbs.js') }}"></script>

<script src="{{ asset('assets/js/portal-effects.js') }}"></script>





{{-- Atendentes Mythra --}}
<script src="{{ asset('assets/js/portal-agents.js') }}"></script>

<script src="{{ asset('assets/js/portal-agents-info.js') }}"></script>

<script src="{{ asset('assets/js/portal-assistant.js') }}"></script>





{{-- Núcleo Mythra --}}
<script src="{{ asset('assets/js/mythra.js') }}"></script>

<script src="{{ asset('assets/js/core.js') }}"></script>


</body>


</html>