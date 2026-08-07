@extends('layouts.mythra')

@section('title', 'Mythra Marketing - Conteúdos')

@section('content')

<div class="module-container">

    <h1>Conteúdos</h1>


    <a href="{{ route('marketing.contents.create') }}">
        Novo Conteúdo
    </a>


    @if(session('success'))

        <div>
            {{ session('success') }}
        </div>

    @endif


    <table width="100%" border="1">

        <thead>

            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>

        </thead>


        <tbody>


        @forelse($contents as $content)

            <tr>

                <td>
                    {{ $content->title }}
                </td>


                <td>
                    {{ $content->type }}
                </td>


                <td>
                    {{ $content->status }}
                </td>


                <td>
                    {{ $content->author ?? '-' }}
                </td>


                <td>

                    <a href="{{ route('marketing.contents.show', $content) }}">
                        Ver
                    </a>


                    <a href="{{ route('marketing.contents.edit', $content) }}">
                        Editar
                    </a>


                    <form
                        action="{{ route('marketing.contents.destroy', $content) }}"
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


        @empty


            <tr>

                <td colspan="5">
                    Nenhum conteúdo cadastrado.
                </td>

            </tr>


        @endforelse


        </tbody>


    </table>


    {{ $contents->links() }}


</div>

@endsection