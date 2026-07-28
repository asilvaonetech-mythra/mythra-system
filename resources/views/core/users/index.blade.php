@extends('layouts.mythra')

@section('title', 'Usuários')

@section('content')

<div class="mythra-page">

    <div class="page-header">

        <div>

            <h1>Usuários</h1>

            <p>Gerenciamento de usuários do Mythra.</p>

        </div>

        <div>

            <a
                href="{{ route('core.users.create') }}"
                class="btn btn-primary"
            >
                Novo Usuário
            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="mythra-card">

        <form
            method="GET"
            action="{{ route('core.users.index') }}"
            class="mb-4"
        >

            <div class="row">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Pesquisar usuário..."
                        value="{{ request('search') }}"
                    >

                </div>

                <div class="col-md-2">

                    <button
                        class="btn btn-outline-primary w-100"
                    >

                        Buscar

                    </button>

                </div>

            </div>

        </form>

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Nome</th>

                    <th>E-mail</th>

                    <th>Roles</th>

                    <th width="170">Ações</th>

                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

                <tr>

                    <td>

                        {{ $user->name }}

                    </td>

                    <td>

                        {{ $user->email }}

                    </td>

                    <td>

                        @foreach($user->roles as $role)

                            <span class="badge bg-primary">

                                {{ $role->display_name }}

                            </span>

                        @endforeach

                    </td>

                    <td>

                        <a
                            href="{{ route('core.users.edit',$user) }}"
                            class="btn btn-sm btn-warning"
                        >

                            Editar

                        </a>

                        <form
                            action="{{ route('core.users.destroy',$user) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                onclick="return confirm('Excluir usuário?')"
                                class="btn btn-sm btn-danger"
                            >

                                Excluir

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        Nenhum usuário encontrado.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-4">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection