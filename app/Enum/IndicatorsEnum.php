<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

abstract class IndicatorsEnum extends Enum
{

    public const INDICADORES = [
        1 => 'Aspectos organizativos de la clase',
        2 => 'Tratamiento didáctico-metodológico',
        3 => 'Aplicación de las estrategias curriculares',
        4 => 'Cumplimiento de los objetivos de la clase',
    ];

    public const INDICADORES_GROUP = [
        'first' => [1, 2],
        'second' => [3, 4]
    ];

    public const INDICADORES_MAP = [
        1 => [
            '1.1' => [
                'type' => 'boolean',
                'name' => 'Correspondencia con el Programa y el Plan Calendario de la asignatura (P1)',
            ],
            '1.2' => [
                'type' => 'string',
                'name' => 'Comienzo de la clase a la hora prevista, asistencia y puntualidad de los estudiantes y el profesor',
            ]
        ],
        2 => [
            '2.1' => [
                'type' => 'string',
                'name' => 'Orientación hacia el cumplimiento del objetivo de la actualidad',
            ],
            '2.2' => [
                'type' => 'string',
                'name' => 'Organización, tratamiento uso de los metodos de enseñanza y dominio de los contenidos'
            ],
            '2.3' => [
                'type' => 'string',
                'name' => 'Uso de las formas de control y/o evaluación del aprendizaje',
            ],
            '2.4' => [
                'type' => 'string',
                'name' => 'Orientación del estudio trabajo independiente, con indicadores claros y medibles para su ejecución y control'
            ],
            '2.5' => [
                'type' => 'string',
                'name' => 'Uso de los medios de enseñanza aprendizaje'
            ]
        ],
        3 => [
            '3.1' => [
                'type' => 'string',
                'name' => 'Comunicación profesor-estudiante y estudiante-estudiante. Formación en valores de los estudiantes a traves de los contenidos de la clase'
            ],
            '3.2' => [
                'type' => 'string',
                'name' => 'Cumplimiento de la estrategia de trabajo político-ideológico desde la clase'
            ],
            '3.3' => [
                'type' => '',
                'name' => 'Cuidado y rigor en la exposición de sus ideas, precisión en el lenguaje oral y escrito'
            ],
            '3.4' => [
                'type' => '',
                'name' => 'Vinculación con otras materias del año o de la carrera'
            ]
        ],
        4 => [
            '4.1' => [
                'type' => '',
                'name' => 'Se cumplieron los objetivos definidos para la clase',
            ]
        ]
    ];
}
