<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email === 'flavio@mail.com';
    }

    public function edit(User $user, User $model): bool
    {
        return (bool) random_int(0,1);
    }
}
