@extends('layouts.mythra')

@section('title', 'Mythra Marketing - Conteúdo')

@section('content')

<h1>{{ $content->title }}</h1>

<p>
    <strong>Tipo:</strong>
    {{ $content->type }}
</p>

<p>
    <strong>Status:</strong>
    {{ $content->status }}
</p>

@if($content->author)

```
<p>
    <strong>Autor:</strong>
    {{ $content->author }}
</p>
```

@endif

@if($content->campaign)

```
<p>
    <strong>Campanha:</strong>
    {{ $content->campaign->name }}
</p>
```

@endif

@if($content->body)

```
<h2>Conteúdo</h2>

<div>
    {!! nl2br(e($content->body)) !!}
</div>
```

@endif

@if($content->tags)

```
<h2>Tags</h2>

<ul>

    @foreach($content->tags as $tag)

        <li>
            {{ $tag }}
        </li>

    @endforeach

</ul>
```

@endif

<hr>

<a href="{{ route('marketing.contents.index') }}">
    Voltar
</a>

<a href="{{ route('marketing.contents.edit', $content) }}">
    Editar
</a>

<form
    action="{{ route('marketing.contents.destroy', $content) }}"
    method="POST"
    style="display:inline"
>

```
@csrf

@method('DELETE')

<button type="submit">
    Excluir
</button>
```

</form>

@endsection
