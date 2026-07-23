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



        @foreach($core as $key => $section)



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





            <a
                href="{{ url('/portal/core/'.$key) }}"
                class="core-action"
            >

                Acessar Núcleo

            </a>




        </section>



        @endforeach



    </div>



</div>


@endsection