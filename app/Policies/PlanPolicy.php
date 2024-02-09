<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\Plan;
use App\Models\User;

class PlanPolicy
{

    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
            RoleEnum::DECANA,
            RoleEnum::JEFE
        ]));
    }

    public function actual(User $user)
    {
        return $user->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE])) && !is_null($user->departament_id);
    }

    public function create(User $user)
    {

        if (is_null($user->departament_id) || !$user->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE]))) {
            return false;
        }

        return true;
    }

    public function delete(User $user, Plan $plan)
    {
        if (!is_null($plan->periodo_id)) {
            return false;
        }

        return $user->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE]));
    }

    public function update()
    {
        return true;
    }
}
