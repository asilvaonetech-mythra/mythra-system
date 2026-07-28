@extends('layouts.mythra')

@section('title', 'Novo Usuário')

@section('content')

<div class="mythra-page">

    <div class="page-header">

        <div>

            <h1>Novo Usuário</h1>

            <p>Cadastro de um novo usuário.</p>

        </div>

    </div>

    <div class="mythra-card">

        <form
            action="{{ route('core.users.store') }}"
            method="POST"
        >

            @include('core.users.form')

        </form>

    </div>

</div>

@endsection