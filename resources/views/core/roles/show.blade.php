@extends('layouts.mythra')

@section('title', 'Visualizar Role - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                {{ $role->display_name ?? $role->name }}
            </h1>


            <p>
                Detalhes da estrutura de acesso Mythra
            </p>

        </div>


    </div>





    <section class="core-card">


        <h2>
            Informações da Role
        </h2>



        <p>

            <strong>
                Nome:
            </strong>

            {{ $role->name }}

        </p>




        <p>

            <strong>
                Slug:
            </strong>

            {{ $role->slug }}

        </p>




        <p>

            <strong>
                Descrição:
            </strong>

            {{ $role->description ?? 'Sem descrição' }}

        </p>




        <p>

            <strong>
                Role do Sistema:
            </strong>


            {{ $role->is_system ? 'Sim' : 'Não' }}

        </p>




        <p>

            <strong>
                Status:
            </strong>


            {{ $role->is_active ? 'Ativa' : 'Inativa' }}

        </p>



    </section>






    <section class="core-card">


        <h2>
            Permissões Vinculadas
        </h2>



        @forelse($role->permissions as $permission)


            <div>


                <strong>
                    {{ $permission->display_name ?? $permission->name }}
                </strong>


                <br>


                <small>

                    {{ $permission->slug }}

                </small>


            </div>


            <hr>



        @empty


            <p>
                Nenhuma permissão vinculada.
            </p>


        @endforelse



    </section>






    <section class="core-card">


        <h2>
            Usuários Vinculados
        </h2>



        @forelse($role->users as $user)


            <div>


                <strong>
                    {{ $user->name }}
                </strong>


                <br>


                <small>

                    {{ $user->email }}

                </small>


            </div>


            <hr>



        @empty


            <p>
                Nenhum usuário vinculado.
            </p>


        @endforelse



    </section>



</div>


@endsection