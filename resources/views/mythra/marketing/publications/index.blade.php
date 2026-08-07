@extends('layouts.mythra')

@section('title', 'Publicações')

@section('content')

<div class="container">

    <h1>Publicações</h1>

    <a href="{{ route('marketing.publications.create') }}">
        Nova Publicação
    </a>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif


    @if($publications->count())

        <table width="100%" border="1">

            <thead>
                <tr>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Agendada</th>
                    <th>Publicada</th>
                    <th>Ações</th>
                </tr>
            </thead>


            <tbody>

            @foreach($publications as $publication)

                <tr>

                    <td>
                        {{ $publication->title }}
                    </td>


                    <td>
                        {{ $publication->status }}
                    </td>


                    <td>
                        {{ $publication->scheduled_at?->format('d/m/Y H:i') ?? '-' }}
                    </td>


                    <td>
                        {{ $publication->published_at?->format('d/m/Y H:i') ?? '-' }}
                    </td>


                    <td>

                        <a href="{{ route('marketing.publications.show', $publication) }}">
                            Ver
                        </a>


                        <a href="{{ route('marketing.publications.edit', $publication) }}">
                            Editar
                        </a>


                        <form 
                            action="{{ route('marketing.publications.destroy', $publication) }}"
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


        {{ $publications->links() }}


    @else

        <p>
            Nenhuma publicação cadastrada.
        </p>

    @endif


</div>

@endsection