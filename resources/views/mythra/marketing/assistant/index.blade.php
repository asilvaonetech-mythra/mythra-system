@extends('layouts.mythra')


@section('title', 'Elara - Assistente de Marketing Mythra')


@section('content')


<h1>
    Elara — Assistente de Marketing Mythra
</h1>



<h2>
    Identidade
</h2>


<p>
    Agente:
    {{ $data['identity']['name'] }}
</p>


<p>
    Domínio:
    {{ $data['identity']['domain'] }}
</p>




<h2>
    Plano Editorial
</h2>


<ul>

    <li>
        Posts:
        {{ $data['editorial']['posts'] }}
    </li>


    <li>
        Vídeos:
        {{ $data['editorial']['videos'] }}
    </li>


    <li>
        Stories:
        {{ $data['editorial']['stories'] }}
    </li>


    <li>
        Campanhas:
        {{ $data['editorial']['campaigns'] }}
    </li>

</ul>





<h2>
    Análise Atual do Marketing
</h2>


<ul>

    <li>
        Marca:
        {{ $data['analysis']['brand'] }}
    </li>


    <li>
        Campanhas:
        {{ $data['analysis']['campaigns'] }}
    </li>


    <li>
        Conteúdos:
        {{ $data['analysis']['contents'] }}
    </li>


    <li>
        Publicações:
        {{ $data['analysis']['publications'] }}
    </li>


    <li>
        Métricas:
        {{ $data['analysis']['metrics'] }}
    </li>


    <li>
        Automações:
        {{ $data['analysis']['automations'] }}
    </li>


    <li>
        Status:
        {{ $data['analysis']['status'] }}
    </li>

</ul>





<h2>
    Sugestões Estratégicas da Elara
</h2>


<ul>

    <li>
        Posts sugeridos:
        {{ $data['suggestions']['posts'] }}
    </li>


    <li>
        Vídeos sugeridos:
        {{ $data['suggestions']['videos'] }}
    </li>


    <li>
        Stories sugeridos:
        {{ $data['suggestions']['stories'] }}
    </li>


    <li>
        Campanhas sugeridas:
        {{ $data['suggestions']['campaigns'] }}
    </li>

</ul>





<h2>
    Objetivo do Agente
</h2>


<p>
    A Elara monitora o domínio Marketing Mythra,
    analisa dados existentes,
    registra memória estratégica
    e prepara recomendações para criação,
    publicação e automação de comunicação.
</p>



@endsection