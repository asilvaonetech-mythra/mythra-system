@extends('layouts.mythra')

@section('title', 'Editar Role - Mythra Core')


@section('content')


<div class="mythra-core">


    <div class="core-header">


        <div class="core-symbol">
            ✦
        </div>


        <div>

            <h1>
                Editar Role
            </h1>


            <p>
                Atualização de nível de acesso do ecossistema Mythra
            </p>

        </div>


    </div>




    <section class="core-card">


        <form method="POST" action="{{ route('core.roles.update', $role) }}">

            @csrf

            @method('PUT')



            <div>

                <label>
                    Nome
                </label>


                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $role->name) }}"
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
                    value="{{ old('slug', $role->slug) }}"
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
                    value="{{ old('display_name', $role->display_name) }}"
                >

            </div>




            <div>

                <label>
                    Descrição
                </label>


                <textarea
                    name="description"
                >{{ old('description', $role->description) }}</textarea>

            </div>




            <div>

                <label>
                    Cor
                </label>


                <input
                    type="text"
                    name="color"
                    value="{{ old('color', $role->color) }}"
                >

            </div>




            <div>

                <label>
                    Ícone
                </label>


                <input
                    type="text"
                    name="icon"
                    value="{{ old('icon', $role->icon) }}"
                >

            </div>




            <button
                type="submit"
                class="core-action"
            >

                Atualizar Role

            </button>



        </form>


    </section>


</div>


@endsection