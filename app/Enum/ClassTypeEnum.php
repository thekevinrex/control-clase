<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

abstract class ClassTypeEnum extends Enum
{
    const CONFERENCIA = 'ce';

    const CLASE_PRACTICA = 'cp';

    const LABORATORIO = 'lab';


    const TYPES = [
        self::CONFERENCIA => 'Conferencia',
        self::CLASE_PRACTICA => 'Clase practica',
        self::LABORATORIO => 'Laboratorio',
    ];
}
