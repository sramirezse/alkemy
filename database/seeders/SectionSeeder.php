<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Section1',
                    'slug' => 'section1',
                ],
                [
                    'id' => 2,
                    'name' => 'Section2',
                    'slug' => 'section2',
                ],
                [
                    'id' => 3,
                    'name' => 'Section3',
                    'slug' => 'section3',
                ],
                [
                    'id' => 4,
                    'name' => 'Section4',
                    'slug' => 'section4',
                ],
                [
                    'id' => 5,
                    'name' => 'Footer',
                    'slug' => 'footer',
                ],
            ]
        );
        $section1 = [
            'images' => [
                [
                    'alt' => 'slider1',
                    'path' => 'images/banner.jpg',
                ],
                [
                    'alt' => 'slider2',
                    'path' => 'images/banner.jpg',
                ]
            ],
        ];
        $section2 = [
            'section2-h2' => 'Aquí encontrarás información revelante para aclarar dudas sobre cuándo y dónde vacunarse.',
            'cards-container' => [
                'card1' => [
                    'icon' => 'images/icon_calendar-white.png',
                    'title' => '¿Qué es la vacuna?',
                    'text' => 'La vacuna es una sustancia química que se aplica a la piel para prevenir o tratar enfermedades.',
                    'button' => [
                        'text' => 'Conoce más',
                        'url' => '#'
                    ],
                ],
                'card2' => [
                    'icon' => 'images/icon_location-white.png',
                    'title' => '¿Qué es la vacuna?',
                    'text' => 'La vacuna es una sustancia química que se aplica a la piel para prevenir o tratar enfermedades.',
                    'button' => [
                        'text' => 'Conoce más',
                        'url' => '#'
                    ],
                ],
            ]
        ];
        $section3 = [
            'section3-h3' => 'Aquí encontrarás información revelante para aclarar dudas sobre cuándo y dónde vacunarse.',
            'p-1' => '<p>La vacunación es la estrategia más útil y segura<mark><b>para prevenir muertes por enfermedades infecciosas en
            todo el mundo,</b></mark> y aunque con frecuencia se piensa que la etapa de vacunación sucedo solo en la
        niñez, no
        es así, <mark> <b>existe una vacuna para cada etapa de la vida.</b> </mark> </p>',
            'p-2' => '<p>Por esta razón, <b> queremos informar, a profesionales de la salud y a la población, acerca de las vacunas,
            enfermedades,</b> centros de salud y calendario de vacunas para tomar control de ellas, prevenir y
            protegernos entre todos.</p>'
        ];
        $section4 = [
            'section4-h3' => 'Te presentamos articulos sobre vacunación y sus beneficios para la salud.',
            'cards' => [
                'card1' => [
                    'icon' => 'images/icon_molecule-green.png',
                    'h4' => 'Enfermedades',
                    'p' => 'Conoce cada una de ellas, sus riesgos, sintomas y cómo prevenirlas.',
                    'a' => [
                        'text' => 'Conoce más',
                        'url' => '#'
                    ]
                ],
                'card2' => [
                    'icon' => 'images/icon_article-orange.png',
                    'h4' => 'Artículos',
                    'p' => 'Descubre las noticias e información sobre la importancia de las vacunas.',
                    'a' => [
                        'text' => 'Conoce más',
                        'url' => '#'
                    ]
                ],
            ]

        ];
        $footer = [
            'paraps' => [
                'p' => '<b>
                <p>Derechos reservados</p>
                <p>La reproduccion completa o parcial de este material está prohibida</p>
                <p>&#169; 2020 Grupo de Compañías GSK. NP-xxxx-xxx Agosto 2020</p>
            </b>'
            ],
            'icons' => [
                [
                    'icon' => 'images/icon_facebook-white.png',
                    'url' => '#',
                ],
                [
                    'icon' => 'images/icon_twitter-white.png',
                    'url' => '#',
                ],
                [
                    'icon' => 'images/icon_instagram-white.png',
                    'url' => '#',
                ],
            ]
        ];
        DB::table('section_contents')->insert(
            [
                [
                    'id' => 1,
                    'section_id' => 1,
                    'content' => json_encode($section1)
                ],
                [
                    'id' => 2,
                    'section_id' => 2,
                    'content' => json_encode($section2)
                ],
                [
                    'id' => 3,
                    'section_id' => 3,
                    'content' => json_encode($section3)
                ],
                [
                    'id' => 4,
                    'section_id' => 4,
                    'content' => json_encode($section4)
                ],
                [
                    'id' => 5,
                    'section_id' => 5,
                    'content' => json_encode($footer)
                ],
            ]
        );
    }
}
