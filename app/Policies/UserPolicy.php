<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    public function viewUsers(User $user)
    {
        return $user !== null;
    }

    public function storeUser(User $user)
    {
        return $user->roles->contains('name', 'admin');
    }

    public function updateUser(User $user)
    {
        $isAdmin = $user->roles->contains('name', 'admin');
        $isAccountUser = $user->id === Auth::user()->id;
        if ($isAdmin && $isAccountUser)
        {
            return true;
        }
        return false;
    }
}
