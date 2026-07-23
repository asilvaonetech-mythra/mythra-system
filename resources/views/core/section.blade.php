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

                    {{ $item }}

                </li>


                @endforeach


            </ul>


        </section>



    </div>




</div>


@endsection