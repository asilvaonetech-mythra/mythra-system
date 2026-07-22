<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        @yield('title','Mythra')

    </title>

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/portal.css') }}">

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/modules.css') }}">

</head>

<body>

<div id="mythra-universe">

    @include('components.background')

    <header class="module-navbar">

        <div class="module-logo">

            ✦

            <span>

                Mythra System

            </span>

        </div>



        <nav class="module-menu">

            <a href="/portal">

                Portal

            </a>

            <a href="/portal/core">

                Core

            </a>

            <a href="/portal/talent">

                Talent

            </a>

            <a href="/portal/business">

                Business

            </a>

            <a href="/portal/vision">

                Vision

            </a>

            <a href="/portal/insight">

                Insight

            </a>

        </nav>

    </header>



    <main>

        @yield('content')

    </main>

</div>

<script src="{{ asset('assets/js/mythra.js') }}"></script>

</body>

</html>