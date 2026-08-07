@extends('layouts.mythra')

@section('title', 'Nova Rede Social')

@section('content')

<div class="container">

    <h1>Nova Rede Social</h1>

    <form method="POST" action="{{ route('marketing.social-networks.store') }}">

        @csrf

        <div>
            <label>Nome</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name') }}"
                required
            >
        </div>

        <br>

        <div>
            <label>Provedor</label>
            <select name="provider" required>

                <option value="">
                    Selecione
                </option>

                <option value="Instagram">
                    Instagram
                </option>

                <option value="Facebook">
                    Facebook
                </option>

                <option value="LinkedIn">
                    LinkedIn
                </option>

                <option value="YouTube">
                    YouTube
                </option>

                <option value="TikTok">
                    TikTok
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Usuário</label>
            <input 
                type="text" 
                name="username"
                value="{{ old('username') }}"
            >
        </div>

        <br>

        <div>
            <label>URL do Perfil</label>
            <input 
                type="url" 
                name="profile_url"
                value="{{ old('profile_url') }}"
            >
        </div>

        <br>

        <div>
            <label>Status</label>

            <select name="is_active">

                <option value="1">
                    Ativa
                </option>

                <option value="0">
                    Inativa
                </option>

            </select>

        </div>

        <br>

        <button type="submit">
            Salvar Rede Social
        </button>

    </form>

</div>

@endsection