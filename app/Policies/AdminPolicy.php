<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //用户只能编辑自己
//    public function update(User $currentUser, User $user)
//    {
//        return $currentUser->id === $user->id;
//    }



}
