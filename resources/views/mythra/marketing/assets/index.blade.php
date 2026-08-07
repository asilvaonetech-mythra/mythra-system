@extends('layouts.module')

@section('title', 'Biblioteca de Mídia Mythra')

@section('content')

<h1>Biblioteca de Mídia Mythra</h1>

<a href="{{ route('marketing.assets.create') }}">
    Nova Mídia
</a>


@if(session('success'))

    <div>
        {{ session('success') }}
    </div>

@endif


<hr>


<h2>Imagens</h2>

@if($imageAssets->count())

<table width="100%" border="1">

<thead>
<tr>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Descrição</th>
    <th>Data</th>
    <th>Ações</th>
</tr>
</thead>


<tbody>

@foreach($imageAssets as $asset)

<tr>

<td>
    {{ $asset->name }}
</td>


<td>
    {{ $asset->category }}
</td>


<td>
    {{ $asset->description }}
</td>


<td>
    {{ $asset->created_at->format('d/m/Y H:i') }}
</td>


<td>

<a href="{{ route('marketing.assets.show', [
    'type' => 'image',
    'id' => $asset->id
]) }}">
    Ver
</a>


<a href="{{ route('marketing.assets.edit', [
    'type' => 'image',
    'id' => $asset->id
]) }}">
    Editar
</a>


<form
    action="{{ route('marketing.assets.destroy', [
        'type' => 'image',
        'id' => $asset->id
    ]) }}"
    method="POST"
    style="display:inline"
>

@csrf
@method('DELETE')

<button
    type="submit"
    onclick="return confirm('Deseja realmente remover esta mídia?')"
>
    Excluir
</button>

</form>


</td>

</tr>

@endforeach

</tbody>

</table>

@else

<p>
Nenhuma imagem cadastrada.
</p>

@endif



<hr>


<h2>Vídeos</h2>

@if($videoAssets->count())

<p>
Existem {{ $videoAssets->count() }} vídeo(s) cadastrado(s).
</p>

@foreach($videoAssets as $asset)

<a href="{{ route('marketing.assets.show', [
    'type' => 'video',
    'id' => $asset->id
]) }}">
    {{ $asset->name }}
</a>

<br>

@endforeach


@else

<p>
Nenhum vídeo cadastrado.
</p>

@endif



<hr>


<h2>Áudios</h2>

@if($audioAssets->count())

<p>
Existem {{ $audioAssets->count() }} áudio(s) cadastrado(s).
</p>

@foreach($audioAssets as $asset)

<a href="{{ route('marketing.assets.show', [
    'type' => 'audio',
    'id' => $asset->id
]) }}">
    {{ $asset->name }}
</a>

<br>

@endforeach


@else

<p>
Nenhum áudio cadastrado.
</p>

@endif


@endsection