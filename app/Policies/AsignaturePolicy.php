<?php

namespace App\Policies;

use App\Enum\RoleEnum;
use App\Models\User;

class AsignaturePolicy
{

    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->roles->contains(RoleEnum::ADMIN);
    }
}
