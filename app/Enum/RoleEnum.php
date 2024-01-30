<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

abstract class RoleEnum extends Enum
{
    const ADMIN = 1;

    const DECANA = 2;

    const JEFE = 3;

    const PROFESOR = 4;

    const JEFE_ASIGNATURE = 5;

    const UPDATEUSERS = [
        self::ADMIN,
        self::DECANA,
        self::JEFE,
    ];

    const UPDATEDEPARTAMENTS = [
        self::ADMIN,
        self::DECANA,
    ];

    const ROLES = [
        self::ADMIN => 'Administrator',
        self::DECANA => 'Decana',
        self::JEFE => 'Departament Jefe',
        self::PROFESOR => 'Profesor',
        self::JEFE_ASIGNATURE => 'Asignature Jefe',
    ];
}

?>