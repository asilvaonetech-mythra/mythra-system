@extends('layouts.mythra')

@section('title', 'Redes Sociais')

@section('content')

<div class="container">

```
<h1>Redes Sociais</h1>

<a href="{{ route('marketing.social-networks.create') }}">
    Nova Rede Social
</a>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if($socialNetworks->count())

    <table width="100%" border="1">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Provedor</th>
                <th>Usuário</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($socialNetworks as $socialNetwork)

            <tr>

                <td>
                    {{ $socialNetwork->name }}
                </td>

                <td>
                    {{ $socialNetwork->provider }}
                </td>

                <td>
                    {{ $socialNetwork->username ?? '-' }}
                </td>

                <td>
                    {{ $socialNetwork->is_active ? 'Ativa' : 'Inativa' }}
                </td>

                <td>

                    <a href="{{ route('marketing.social-networks.show', $socialNetwork) }}">
                        Ver
                    </a>

                    <a href="{{ route('marketing.social-networks.edit', $socialNetwork) }}">
                        Editar
                    </a>

                    <form
                        action="{{ route('marketing.social-networks.toggle', $socialNetwork) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('PATCH')

                        <button type="submit">
                            {{ $socialNetwork->is_active ? 'Desativar' : 'Ativar' }}
                        </button>

                    </form>

                    <form
                        action="{{ route('marketing.social-networks.destroy', $socialNetwork) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $socialNetworks->links() }}

@else

    <p>
        Nenhuma rede social cadastrada.
    </p>

@endif
```

</div>

@endsection
