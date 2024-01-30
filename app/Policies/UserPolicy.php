<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->roles->contains(fn($value) => in_array($value->role_id, RoleEnum::UPDATEUSERS));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, $role_id): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->roles->contains(fn($value) => in_array($value->role_id, [RoleEnum::ADMIN]))) {
            return true;
        }

        if (in_array($role_id, [RoleEnum::ADMIN, RoleEnum::DECANA])) {
            return false;
        }

        if ($role_id == RoleEnum::JEFE && !$user->roles->contains(fn($value) => in_array($value->role_id, [RoleEnum::DECANA]))) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $toEdit): bool
    {
        if ($user->id == $toEdit->id) {
            return true;
        }

        if ($toEdit->isAdmin()) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return $this->checkRole($user, $toEdit);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $toDelete): bool
    {

        if ($toDelete->isAdmin()) {
            return false;
        }

        if ($user->id == $toDelete->id) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        return $this->checkRole($user, $toDelete);
    }

    private function checkRole($user, $to)
    {
        if ($to->roles->contains(RoleEnum::ADMIN)) {
            return false;
        }

        if ($to->roles->contains(RoleEnum::DECANA) && !$user->roles->contains(fn($role) => in_array($role, [RoleEnum::ADMIN]))) {
            return false;
        }

        if ($to->roles->contains(RoleEnum::JEFE) && !$user->roles->contains(fn($role) => in_array($role, [RoleEnum::ADMIN, RoleEnum::DECANA]))) {
            return false;
        }

        return $user->departament_id == $to->departament_id;

    }
}