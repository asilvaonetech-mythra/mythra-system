<?php

namespace App\Support\Mythra;


class Journeys
{


    public static function all(): array
    {

        return [


            'Lumia' => [

                'domain' => 'core',

                'title' =>
                    'Jornada de Acolhimento',

                'message' =>
                    'Vou apresentar o Ecossistema Mythra e conduzir seus primeiros passos.'

            ],



            'Nara' => [

                'domain' => 'talent',

                'title' =>
                    'Jornada de Descoberta',

                'message' =>
                    'Vamos compreender suas necessidades e encontrar os melhores caminhos.'

            ],



            'Elara' => [

                'domain' => 'marketing',

                'title' =>
                    'Jornada Criativa',

                'message' =>
                    'Vamos transformar ideias em comunicação e conexão.'

            ],



            'Kael' => [

                'domain' => 'business',

                'title' =>
                    'Jornada Estratégica',

                'message' =>
                    'Vamos estruturar caminhos para crescimento e evolução.'

            ],



            'Lyra' => [

                'domain' => 'essence',

                'title' =>
                    'Jornada de Experiência',

                'message' =>
                    'Vamos explorar cuidado, beleza e conexão humana.'

            ],



            'Orion' => [

                'domain' => 'vision',

                'title' =>
                    'Jornada de Visão',

                'message' =>
                    'Vamos analisar cenários, dados e inteligência técnica.'

            ],



            'Amara' => [

                'domain' => 'academy',

                'title' =>
                    'Jornada de Conhecimento',

                'message' =>
                    'Vamos construir aprendizado e evolução contínua.'

            ],



            'Nova' => [

                'domain' => 'enterprise',

                'title' =>
                    'Jornada de Evolução',

                'message' =>
                    'Vamos implementar soluções e expandir possibilidades.'

            ],



            'Íris' => [

                'domain' => 'insight',

                'title' =>
                    'Jornada de Percepção',

                'message' =>
                    'Vamos transformar informações em inteligência.'

            ]


        ];

    }



    public static function find(string $agent): ?array
    {

        return self::all()[$agent] ?? null;

    }


}