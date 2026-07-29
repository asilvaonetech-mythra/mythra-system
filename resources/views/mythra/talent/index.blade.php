@extends('mythra.talent.layout')

@section('title', 'Mythra Talent')

@section('talent-content')

<div class="talent-home">

    <section class="talent-introduction">

        <h2>
            Bem-vindo ao Mythra Talent
        </h2>

        <p>

            O Mythra Talent é o domínio responsável por conectar pessoas,
            organizações e oportunidades, promovendo evolução profissional,
            desenvolvimento de competências e fortalecimento de conexões
            inteligentes dentro do ecossistema Mythra.

        </p>

    </section>



    <section class="talent-modules">

        <a
            href="{{ route('talent.profiles.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                👤
            </div>

            <h3>
                Talentos
            </h3>

            <p>
                Perfis profissionais, objetivos, histórico e evolução.
            </p>

        </a>



        <a
            href="{{ route('talent.organizations.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                🏛
            </div>

            <h3>
                Organizações
            </h3>

            <p>
                Gestão das organizações participantes do ecossistema.
            </p>

        </a>



        <a
            href="{{ route('talent.opportunities.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                ✨
            </div>

            <h3>
                Oportunidades
            </h3>

            <p>
                Cadastro e organização das oportunidades profissionais.
            </p>

        </a>



        <a
            href="{{ route('talent.selection.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                🔷
            </div>

            <h3>
                Processos
            </h3>

            <p>
                Organização dos processos de conexão entre talentos e
                organizações.
            </p>

        </a>



        <a
            href="{{ route('talent.skills.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                ⭐
            </div>

            <h3>
                Competências
            </h3>

            <p>
                Biblioteca de competências do ecossistema Mythra.
            </p>

        </a>



        <a
            href="{{ route('talent.resumes.index') }}"
            class="talent-card"
        >

            <div class="card-symbol">
                📜
            </div>

            <h3>
                Currículos
            </h3>

            <p>
                Organização das experiências, formação e trajetória
                profissional.
            </p>

        </a>

    </section>

</div>

@endsection