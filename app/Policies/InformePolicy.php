<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use App\Enum\RoleEnum;
use App\Models\Informe;
use Illuminate\Auth\Access\Response;

class InformePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
            RoleEnum::DECANA,
            RoleEnum::JEFE,
            RoleEnum::PROFESOR
        ]));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Informe $informe): bool
    {
        return $user->isAdmin() || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
            RoleEnum::DECANA,
            RoleEnum::JEFE
        ])) || $informe->user_id == $user->id || $informe->to_user_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        $departament_id = $user->departament_id;

        if (is_null($departament_id)) {
            return false;
        }

        $plan = Plan::whereNull('periodo_id')
            ->where('departament_id', $departament_id)->first();

        if (is_null($plan)) {
            return false;
        }

        $total = $plan->controls()->where('controlador', $user->id)->count();
        $actuals = Informe::where('user_id', $user->id)->count();

        if ($actuals >= $total) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Informe $informe): bool
    {
        return $informe->user_id == $user->id || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ])) || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Informe $informe): bool
    {
        return $informe->user_id == $user->id || $user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ])) || $user->isAdmin();
    }
}
