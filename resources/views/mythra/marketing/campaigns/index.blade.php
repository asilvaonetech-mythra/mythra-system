@extends('layouts.mythra')

@section('content')

<div class="container">

    <h1>Campanhas</h1>

    <a href="{{ route('marketing.campaigns.create') }}">
        Nova Campanha
    </a>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif


    <table width="100%">

        <thead>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Orçamento</th>
                <th>Ações</th>
            </tr>
        </thead>


        <tbody>

        @forelse($campaigns as $campaign)

            <tr>

                <td>
                    {{ $campaign->name }}
                </td>

                <td>
                    {{ $campaign->type }}
                </td>

                <td>
                    {{ $campaign->status }}
                </td>

                <td>
                    R$ {{ number_format($campaign->budget,2,',','.') }}
                </td>

                <td>

                    <a href="{{ route('marketing.campaigns.show',$campaign) }}">
                        Ver
                    </a>

                    <a href="{{ route('marketing.campaigns.edit',$campaign) }}">
                        Editar
                    </a>


                    <form
                        action="{{ route('marketing.campaigns.destroy',$campaign) }}"
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
                    Nenhuma campanha cadastrada.
                </td>
            </tr>

        @endforelse


        </tbody>

    </table>

</div>

@endsection