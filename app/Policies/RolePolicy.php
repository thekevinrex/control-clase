<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->roles->contains(RoleEnum::ADMIN);
    }

    public function delete(User $user, Role $role): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($role->role_id === RoleEnum::ADMIN) {
            return false;
        }

        return true;
    }
}
