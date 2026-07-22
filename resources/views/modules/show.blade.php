@extends('layouts.mythra')

@section('title', $module['name'])


@section('content')


<div class="mythra-domain">


    <div class="domain-header">


        <div class="domain-symbol">

            {{ $module['symbol'] }}

        </div>


        <div class="domain-title">

            <h1>
                {{ $module['name'] }}
            </h1>


            <p>
                {{ $module['domain'] }}
            </p>

        </div>


    </div>




    <div class="domain-grid">



        <section class="domain-card">

            <h2>
                Propósito
            </h2>


            <p>
                {{ $module['purpose'] }}
            </p>

        </section>




        <section class="domain-card">

            <h2>
                Missão
            </h2>


            <p>
                {{ $module['mission'] }}
            </p>

        </section>




        <section class="domain-card">

            <h2>
                Visão
            </h2>


            <p>
                {{ $module['vision'] }}
            </p>

        </section>





        @isset($module['attendant'])


        <section class="domain-card attendant-card">


            <h2>
                Atendente Mythra
            </h2>


            <h3>
                {{ $module['attendant']['name'] }}
            </h3>


            <strong>
                {{ $module['attendant']['role'] }}
            </strong>


            <p>
                {{ $module['attendant']['personality'] }}
            </p>


        </section>


        @endisset






        @isset($module['structure'])


        <section class="domain-card">


            <h2>
                Núcleos Estruturais
            </h2>


            <ul>


                @foreach($module['structure'] as $item)


                <li>
                    {{ $item }}
                </li>


                @endforeach


            </ul>


        </section>


        @endisset






        @isset($module['values'])


        <section class="domain-card">


            <h2>
                Valores
            </h2>


            <ul>


                @foreach($module['values'] as $value)


                <li>
                    {{ $value }}
                </li>


                @endforeach


            </ul>


        </section>


        @endisset






        @isset($module['future'])


        <section class="domain-card">


            <h2>
                Evoluções Futuras
            </h2>


            <ul>


                @foreach($module['future'] as $future)


                <li>
                    {{ $future }}
                </li>


                @endforeach


            </ul>


        </section>


        @endisset



    </div>






    {{-- DETALHES OFICIAIS DO DOMÍNIO --}}


    @isset($module['details'])



    <section class="domain-card">


        <h2>
            Núcleos do Domínio
        </h2>


        <ul>


            @foreach($module['details']['nuclei'] as $item)


            <li>
                {{ $item }}
            </li>


            @endforeach


        </ul>


    </section>






    <section class="domain-card">


        <h2>
            Conexões do Ecossistema
        </h2>


        <ul>


            @foreach($module['details']['connections'] as $item)


            <li>
                {{ $item }}
            </li>


            @endforeach


        </ul>


    </section>






    <section class="domain-card">


        <h2>
            Experiência Mythra
        </h2>


        <p>
            {{ $module['details']['experience'] }}
        </p>


    </section>



    @endisset






    {{-- CARDS OFICIAIS DO MÓDULO --}}


    @isset($module['cards'])



    <section class="domain-section">


        <h2>
            Núcleos de Atuação
        </h2>




        <div class="domain-grid">


            @foreach($module['cards'] as $card)



            <div class="domain-card">


                <h3>
                    {{ $card['title'] }}
                </h3>


                <p>
                    {{ $card['text'] }}
                </p>


            </div>



            @endforeach



        </div>



    </section>



    @endisset




</div>



@endsection