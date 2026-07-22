<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mythra</title>

    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">

</head>

<body>

<div class="welcome-screen">

    <img 
    .welcome-background-main{

    position:absolute;

    top:50%;

    left:50%;

    width:90%;

    height:90%;

    transform:translate(-50%, -50%);

    object-fit:contain;

    object-position:center;

    z-index:2;

}
    src="{{ asset('assets/images/mythra/welcome/welcome-base.webp') }}"
    class="welcome-background-main"
    alt="Mythra">

    <div class="welcome-actions">

        <a href="/login">
            Entrar
        </a>

        <a href="/register">
            Criar Conta
        </a>

    </div>


    <div class="welcome-message">

        Você está exatamente onde precisa estar

    </div>


</div>


</body>

</html>