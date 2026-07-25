@extends('layouts.mythra')

@section('title', 'Visualizar Permission - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                {{ $permission->display_name ?? $permission->name }}
            </h1>


            <p>
                Detalhes da permissão dentro do ecossistema Mythra
            </p>

        </div>


    </div>





    <section class="core-card">


        <h2>
            Informações da Permissão
        </h2>



        <p>

            <strong>
                Nome:
            </strong>

            {{ $permission->name }}

        </p>




        <p>

            <strong>
                Slug:
            </strong>

            {{ $permission->slug }}

        </p>




        <p>

            <strong>
                Módulo:
            </strong>

            {{ $permission->module }}

        </p>




        <p>

            <strong>
                Nome de Exibição:
            </strong>

            {{ $permission->display_name }}

        </p>




        <p>

            <strong>
                Descrição:
            </strong>

            {{ $permission->description ?? 'Sem descrição' }}

        </p>




        <p>

            <strong>
                Permissão do Sistema:
            </strong>

            {{ $permission->is_system ? 'Sim' : 'Não' }}

        </p>




        <p>

            <strong>
                Status:
            </strong>

            {{ $permission->is_active ? 'Ativa' : 'Inativa' }}

        </p>



    </section>







    <section class="core-card">


        <h2>
            Roles Vinculadas
        </h2>




        @forelse($permission->roles as $role)



            <div>


                <strong>

                    {{ $role->display_name ?? $role->name }}

                </strong>


                <br>


                <small>

                    {{ $role->slug }}

                </small>


            </div>


            <hr>



        @empty


            <p>
                Nenhuma Role vinculada.
            </p>


        @endforelse



    </section>




</div>


@endsection