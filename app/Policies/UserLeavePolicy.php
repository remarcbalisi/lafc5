<?php

namespace App\Policies;

use App\User;
use App\UserLeave;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserLeavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userLeave.
     *
     * @param  \App\User  $user
     * @param  \App\UserLeave  $userLeave
     * @return mixed
     */
    public function view(User $user, UserLeave $userLeave)
    {
        return $userLeave->user_id === $user->id && $userLeave->is_owner === 1;
    }

    /**
     * Determine whether the user can create userLeaves.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the userLeave.
     *
     * @param  \App\User  $user
     * @param  \App\UserLeave  $userLeave
     * @return mixed
     */
    public function update(User $user, UserLeave $userLeave)
    {
        //
    }

    /**
     * Determine whether the user can delete the userLeave.
     *
     * @param  \App\User  $user
     * @param  \App\UserLeave  $userLeave
     * @return mixed
     */
    public function delete(User $user, UserLeave $userLeave)
    {
        //
    }
}
