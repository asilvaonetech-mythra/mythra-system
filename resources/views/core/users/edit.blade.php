@extends('layouts.mythra')

@section('title', 'Editar Usuário')

@section('content')

<div class="mythra-page">

    <div class="page-header">

        <div>

            <h1>Editar Usuário</h1>

            <p>{{ $user->name }}</p>

        </div>

    </div>

    <div class="mythra-card">

        <form
            action="{{ route('core.users.update', $user) }}"
            method="POST"
        >

            @method('PUT')

            @include('core.users.form')

        </form>

    </div>

</div>

@endsection