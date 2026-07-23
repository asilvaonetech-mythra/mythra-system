@extends('layouts.mythra')

@section('title', $section['title'])


@section('content')


<div class="mythra-domain">



    <div class="domain-header">



        <div class="domain-symbol">

            ✦

        </div>





        <div class="domain-title">


            <h1>

                {{ $section['title'] }}

            </h1>



            <p>

                Mythra Core

            </p>


        </div>



    </div>







    <div class="domain-grid">






        <section class="domain-card">



            <h2>

                Propósito

            </h2>




            <p>

                {{ $section['description'] }}

            </p>




        </section>









        <section class="domain-card">



            <h2>

                Elementos do Núcleo

            </h2>




            <ul>



                @foreach($section['items'] as $item)



                <li>


                    @if(is_array($item))


                        @if(isset($item['name']))

                            <strong>

                                {{ $item['name'] }}

                            </strong>


                            @if(isset($item['role']))

                            -

                            {{ $item['role'] }}

                            @endif


                        @else

                            {{ json_encode($item) }}

                        @endif


                    @else


                        {{ $item }}


                    @endif



                </li>



                @endforeach



            </ul>




        </section>







        @isset($section['details'])



        <section class="domain-card">



            <h2>

                Informações do Núcleo

            </h2>




            @if(isset($section['details']['purpose']))


            <p>

                {{ $section['details']['purpose'] }}

            </p>


            @endif





            @if(isset($section['details']['functions']))



            <h3>

                Funções

            </h3>




            <ul>



                @foreach($section['details']['functions'] as $function)



                <li>

                    {{ $function }}

                </li>



                @endforeach



            </ul>



            @endif




        </section>



        @endisset







        @if(isset($section['agents']))



        <section class="domain-card">



            <h2>

                Agentes Mythra

            </h2>




            <div class="domain-grid">





                @foreach($section['agents'] as $agent)



                <div class="domain-card attendant-card">



                    <h3>

                        {{ $agent['name'] }}

                    </h3>




                    <p>

                        <strong>

                            Domínio:

                        </strong>

                        {{ $agent['domain'] }}

                    </p>





                    <p>

                        <strong>

                            Função:

                        </strong>

                        {{ $agent['role'] }}

                    </p>





                    <p>

                        {{ $agent['personality'] }}

                    </p>




                    <p>

                        {{ $agent['mission'] }}

                    </p>




                </div>



                @endforeach





            </div>




        </section>



        @endif







    </div>





    <a
        href="{{ route('core.index') }}"
        class="core-action"
    >

        Voltar ao Mythra Core

    </a>




</div>



@endsection