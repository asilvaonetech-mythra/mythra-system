@extends('layouts.mythra')

@section('title', 'Portal Mythra')

@section('content')

<div id="portal" class="portal-fullscreen">


    <div class="portal-container">


        <div class="portal-map" id="portal-map">


            <img
                src="{{ asset('assets/images/mythra/portal/mythra-portal-clean.webp') }}"
                id="portal-image"
                alt="Mapa Oficial da Mythra"
            >


            <div class="portal-energy"></div>


            <svg
                class="portal-connections"
                id="portal-network"
                viewBox="0 0 100 100"
                preserveAspectRatio="none">
            </svg>



            <div id="portal-modules">


                <div class="portal-hotspot module-core">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Core
                    </span>
                </div>


                <div class="portal-hotspot module-talent">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Talent
                    </span>
                </div>


                <div class="portal-hotspot module-marketing">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Marketing
                    </span>
                </div>


                <div class="portal-hotspot module-vision">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Vision
                    </span>
                </div>


                <div class="portal-hotspot module-academy">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Academy
                    </span>
                </div>


                <div class="portal-hotspot module-insight">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Insight
                    </span>
                </div>


                <div class="portal-hotspot module-essence">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Essence
                    </span>
                </div>


                <div class="portal-hotspot module-business">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Business
                    </span>
                </div>


                <div class="portal-hotspot module-nexus">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Nexus
                    </span>
                </div>


                <div class="portal-hotspot module-enterprise">
                    <div class="portal-node"></div>
                    <span class="portal-label">
                        Mythra Enterprise
                    </span>
                </div>


            </div>




            {{-- ATENDENTES MYTHRA --}}

            <div id="portal-agents">


                <button class="agent-toggle">

                    ✦

                </button>



                <div class="agent-menu">



                    <button class="agent-button" data-agent="Lumia">

                        <strong>
                            Lumia
                        </strong>

                        <span>
                            Acolhimento e conexão
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Nara">

                        <strong>
                            Nara
                        </strong>

                        <span>
                            Descoberta e compreensão
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Elara">

                        <strong>
                            Elara
                        </strong>

                        <span>
                            Criatividade e inspiração
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Kael">

                        <strong>
                            Kael
                        </strong>

                        <span>
                            Estratégia e direcionamento
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Lyra">

                        <strong>
                            Lyra
                        </strong>

                        <span>
                            Sensibilidade e expressão
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Orion">

                        <strong>
                            Orion
                        </strong>

                        <span>
                            Visão e sabedoria
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Amara">

                        <strong>
                            Amara
                        </strong>

                        <span>
                            Inclusão e acessibilidade
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Nova">

                        <strong>
                            Nova
                        </strong>

                        <span>
                            Adaptação e evolução
                        </span>

                    </button>



                    <button class="agent-button" data-agent="Íris">

                        <strong>
                            Íris
                        </strong>

                        <span>
                            Novas formas de percepção
                        </span>

                    </button>



                </div>


            </div>



        </div>


    </div>





    {{-- MYTHRA ASSISTANT --}}

    <div id="portal-assistant">


        <div class="assistant-window">


            <button class="assistant-close">
                ×
            </button>



            <div class="assistant-header">


                <span class="assistant-symbol">
                    ✦
                </span>



                <div>

                    <h2 id="assistant-name">
                        Mythra
                    </h2>


                    <span id="assistant-role">
                        Sabedoria Digital
                    </span>

                </div>


            </div>





            <div class="assistant-body">


                <p id="assistant-message">

                    Selecione um Atendente Mythra para iniciar sua jornada.

                </p>


            </div>





            <div class="assistant-actions">


                <button
                    class="assistant-action"
                    id="start-assistant">

                    Iniciar Atendimento

                </button>


            </div>



        </div>


    </div>



</div>

@endsection