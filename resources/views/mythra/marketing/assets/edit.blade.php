@extends('layouts.module')

@section('title', 'Editar Mídia Mythra')

@section('content')

<h1>Editar Mídia Mythra</h1>


<form
    action="{{ route('marketing.assets.update', [
        'type' => $type,
        'id' => $asset->id
    ]) }}"
    method="POST"
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
        value="{{ old('name', $asset->name) }}"
        required
    >

</div>


<br>


<div>

    <label>
        Categoria
    </label>

    <input
        type="text"
        name="category"
        value="{{ old('category', $asset->category) }}"
    >

</div>


<br>


<div>

    <label>
        Descrição
    </label>

    <textarea
        name="description"
    >{{ old('description', $asset->description) }}</textarea>

</div>


<br>


<button type="submit">
    Atualizar Mídia
</button>


</form>


<br>


<a href="{{ route('marketing.assets.show', [
    'type' => $type,
    'id' => $asset->id
]) }}">
    Voltar
</a>


@endsection