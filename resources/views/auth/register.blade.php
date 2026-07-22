<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mythra | Criar Conta</title>

    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>

<body class="with-background">

<div class="login-page">

    <img
        src="{{ asset('assets/images/mythra/login/login-fundo.webp') }}"
        class="login-background"
        alt="Mythra">

    <div class="login-overlay"></div>

    <div class="login-box">

        <div class="login-content">

            <h1>

                Criar Conta

            </h1>

            <p>

                Inicie sua jornada na Sabedoria Digital.

            </p>

            <form method="POST" action="/register">

    @csrf

                <div class="field">

                    <input
                        type="text"
                        name="name"
                        placeholder="Nome completo">

                </div>

                <div class="field">

                    <input
                        type="email"
                        name="email" 
                        placeholder="E-mail">

                </div>

                <div class="field">

                    <input
                        type="password"
                        name="password"
                        placeholder="Senha">

                </div>

                <div class="field">

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirmar senha">

                </div>

                <button>

                    Criar Conta

                </button>

            <form method="POST" action="/register">

@csrf

            <a href="/login">

                Já possui uma conta? Entrar

            </a>

        </div>

    </div>

</div>

<script src="{{ asset('assets/js/login.js') }}"></script>

</body>

</html>