@extends('layouts.mythra')

@section('title', 'Criar Role - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Nova Role
            </h1>


            <p>
                Criar novo nível de acesso no ecossistema Mythra
            </p>

        </div>


    </div>




    <section class="core-card">


        <form method="POST" action="{{ route('core.roles.store') }}">

            @csrf



            <div>

                <label>
                    Nome
                </label>


                <input
                    type="text"
                    name="name"
                    required
                >

            </div>




            <div>

                <label>
                    Slug
                </label>


                <input
                    type="text"
                    name="slug"
                    required
                >

            </div>




            <div>

                <label>
                    Nome de exibição
                </label>


                <input
                    type="text"
                    name="display_name"
                >

            </div>




            <div>

                <label>
                    Descrição
                </label>


                <textarea
                    name="description"
                ></textarea>

            </div>




            <div>

                <label>
                    Cor
                </label>


                <input
                    type="text"
                    name="color"
                    placeholder="#8A2BE2"
                >

            </div>




            <div>

                <label>
                    Ícone
                </label>


                <input
                    type="text"
                    name="icon"
                >

            </div>




            <button
                type="submit"
                class="core-action"
            >

                Criar Role

            </button>



        </form>


    </section>


</div>


@endsection