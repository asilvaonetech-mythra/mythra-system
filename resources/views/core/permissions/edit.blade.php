@extends('layouts.mythra')

@section('title', 'Editar Permission - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Editar Permissão
            </h1>


            <p>
                Atualização de capacidade de acesso Mythra
            </p>

        </div>


    </div>





    <section class="core-card">


        <form method="POST" action="{{ route('core.permissions.update', $permission) }}">


            @csrf

            @method('PUT')



            <div>

                <label>
                    Nome
                </label>


                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $permission->name) }}"
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
                    value="{{ old('slug', $permission->slug) }}"
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
                    value="{{ old('module', $permission->module) }}"
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
                    value="{{ old('display_name', $permission->display_name) }}"
                >

            </div>




            <div>

                <label>
                    Descrição
                </label>


                <textarea
                    name="description"
                >{{ old('description', $permission->description) }}</textarea>


            </div>




            <button
                type="submit"
                class="core-action"
            >

                Atualizar Permissão

            </button>



        </form>


    </section>



</div>


@endsection