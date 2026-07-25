@extends('layouts.mythra')

@section('title', 'Mythra Core - Permissions')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Permissions
            </h1>


            <p>
                Matriz de permissões do ecossistema Mythra
            </p>

        </div>


    </div>




    <div class="core-grid">


        @foreach($permissions as $permission)


        <section class="core-card">


            <div class="core-card-symbol">
                ✦
            </div>


            <h2>
                {{ $permission->display_name ?? $permission->name }}
            </h2>


            <p>
                Módulo:
                {{ $permission->module }}
            </p>


            <p>
                Slug:
                {{ $permission->slug }}
            </p>


        </section>


        @endforeach


    </div>


</div>


@endsection