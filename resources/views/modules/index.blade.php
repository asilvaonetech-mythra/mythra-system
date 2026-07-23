@extends('layouts.mythra')

@section('title', 'Biblioteca Mythra')


@section('content')

<div class="mythra-library">


    <div class="library-header">


        <div class="library-symbol">
            ✦
        </div>


        <div>

            <h1>
                Biblioteca Mythra
            </h1>


            <p>
                Domínios oficiais do Ecossistema Mythra
            </p>

        </div>


    </div>




    <div class="library-grid">



        @foreach($modules as $module)



        <a 
            href="{{ url('/portal/'.$module['id']) }}"
            class="library-card"
            style="--module-color: {{ $module['color'] }}"
        >



            <div class="library-icon">

                {{ $module['symbol'] }}

            </div>



            <div class="library-content">


                <h2>

                    {{ $module['name'] }}

                </h2>



                <p>

                    {{ $module['domain'] }}

                </p>



                @isset($module['purpose'])

                <span>

                    {{ $module['purpose'] }}

                </span>

                @endisset



            </div>



        </a>



        @endforeach



    </div>



</div>


@endsection