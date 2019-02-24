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

    public function view_all(User $user)
    {
        $super_admin = Role::where(['id' => 1])->first();
        $hr = Role::where(['id' => 2])->first();
        $team_leader = Role::where(['id' => 3])->first();

        if( $user->hasRole($super_admin ) || $user->hasRole($hr) || $user->hasRole($team_leader) ){
            return true;
        }

        return false;
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
