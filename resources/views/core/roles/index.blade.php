@extends('layouts.mythra')

@section('title', 'Mythra Core - Roles')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Roles
            </h1>


            <p>
                Controle de níveis de acesso do ecossistema Mythra
            </p>

        </div>


    </div>




    <div class="core-grid">


        @foreach($roles as $role)


        <section class="core-card">


            <div class="core-card-symbol">
                ✦
            </div>


            <h2>
                {{ $role->display_name ?? $role->name }}
            </h2>


            <p>
                {{ $role->description }}
            </p>


            <p>
                Slug:
                {{ $role->slug }}
            </p>


        </section>


        @endforeach


    </div>


</div>


@endsection