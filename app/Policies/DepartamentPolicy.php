<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\Departament;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DepartamentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->roles->contains(fn($role) => $role->role_id == RoleEnum::DECANA);
    }

}
