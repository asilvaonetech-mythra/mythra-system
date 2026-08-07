@extends('layouts.mythra')

@section('title', 'Editar Rede Social')

@section('content')

<div class="container">

    <h1>Editar Rede Social</h1>


    <form 
        method="POST"
        action="{{ route('marketing.social-networks.update', $socialNetwork) }}"
    >

        @csrf
        @method('PUT')


        <div>

            <label>
                Nome
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $socialNetwork->name) }}"
                required
            >

        </div>


        <br>


        <div>

            <label>
                Provedor
            </label>

            <select name="provider" required>

                <option value="Instagram"
                    {{ $socialNetwork->provider === 'Instagram' ? 'selected' : '' }}>
                    Instagram
                </option>

                <option value="Facebook"
                    {{ $socialNetwork->provider === 'Facebook' ? 'selected' : '' }}>
                    Facebook
                </option>

                <option value="LinkedIn"
                    {{ $socialNetwork->provider === 'LinkedIn' ? 'selected' : '' }}>
                    LinkedIn
                </option>

                <option value="YouTube"
                    {{ $socialNetwork->provider === 'YouTube' ? 'selected' : '' }}>
                    YouTube
                </option>

                <option value="TikTok"
                    {{ $socialNetwork->provider === 'TikTok' ? 'selected' : '' }}>
                    TikTok
                </option>

            </select>

        </div>


        <br>


        <div>

            <label>
                Usuário
            </label>

            <input
                type="text"
                name="username"
                value="{{ old('username', $socialNetwork->username) }}"
            >

        </div>


        <br>


        <div>

            <label>
                URL do Perfil
            </label>

            <input
                type="url"
                name="profile_url"
                value="{{ old('profile_url', $socialNetwork->profile_url) }}"
            >

        </div>


        <br>


        <div>

            <label>
                Status
            </label>

            <select name="is_active">

                <option value="1"
                    {{ $socialNetwork->is_active ? 'selected' : '' }}>
                    Ativa
                </option>

                <option value="0"
                    {{ !$socialNetwork->is_active ? 'selected' : '' }}>
                    Inativa
                </option>

            </select>

        </div>


        <br>


        <button type="submit">
            Atualizar Rede Social
        </button>


    </form>


</div>

@endsection