@extends('layouts.mythra')

@section('title', 'Criar Permission - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Nova Permissão
            </h1>


            <p>
                Criar capacidade de acesso no ecossistema Mythra
            </p>

        </div>


    </div>




    <section class="core-card">


        <form method="POST" action="{{ route('core.permissions.store') }}">

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
                    placeholder="ex: settings.manage"
                    required
                >

            </div>




            <div>

                <label>
                    Módulo
                </label>


                <input
                    type="text"
                    name="module"
                    placeholder="ex: settings"
                    required
                >

            </div>




            <div>

                <label>
                    Nome de Exibição
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




            <button
                type="submit"
                class="core-action"
            >

                Criar Permissão

            </button>



        </form>


    </section>


</div>


@endsection