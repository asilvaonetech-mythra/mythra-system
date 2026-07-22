<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mythra | Login</title>

    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">

</head>

<script src="{{ asset('assets/js/login.js') }}"></script>


<body>


<div class="login-page">

</div>

    <img
    src="{{ asset('assets/images/mythra/login/login-fundo.webp') }}"
    class="login-background"
    alt="Mythra">


    <div class="login-overlay"></div>

    <div class="login-box">

    <div class="login-content">

        <h1>Bem-vindo de volta</h1>

        <p>

            Entre para continuar sua jornada.

        </p>

        <form method="POST" action="/login">

@csrf

            <div class="field">

                <input type="email"
                name="email"
                placeholder="E-mail">

            </div>

            <div class="field">

                <input
                    type="password"
                    name="password"
                    placeholder="Senha">

            </div>

            <button>

                Entrar

            </button>

        </form>

        <a href="/register">

            Criar Conta

        </a>

    </div>

</div>

</body>

</html>