<?php

namespace App\Policies;

use App\Models\User;
use App\Enum\RoleEnum;
use App\Models\Periodo;

class PeriodoPolicy
{

    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
            RoleEnum::DECANA,
            RoleEnum::JEFE
        ]));
    }

    public function create(User $user)
    {

        if (Periodo::whereNull('fecha_fin')->count() > 0) {
            return false;
        }

        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]));
    }

    public function archivar(User $user)
    {

        if (Periodo::whereNull('fecha_fin')->count() <= 0) {
            return false;
        }

        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]));
    }

    public function delete(User $user, Periodo $periodo)
    {
        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]));
    }
}
