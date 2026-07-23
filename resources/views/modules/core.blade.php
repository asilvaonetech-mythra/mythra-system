@extends('layouts.mythra')

@section('title', 'Mythra Core')


@section('content')


<div class="mythra-core">



    <div class="core-header">


        <div class="core-symbol">

            ✦

        </div>


        <div>

            <h1>
                Mythra Core
            </h1>


            <p>
                Centro Integrador do Ecossistema Mythra
            </p>

        </div>


    </div>





    <div class="core-grid">



        @foreach($module['core'] as $key => $section)



        <section class="core-card">



            <div class="core-card-symbol">

                ✦

            </div>




            <h2>

                {{ $section['title'] }}

            </h2>




            <p>

                {{ $section['description'] }}

            </p>




            @isset($section['items'])


            <ul>


                @foreach($section['items'] as $item)


                <li>

                    {{ $item }}

                </li>


                @endforeach


            </ul>


            @endisset




            <button
                class="core-action"
                data-core="{{ $key }}">


                Acessar Núcleo


            </button>



        </section>



        @endforeach



    </div>





</div>


@endsection