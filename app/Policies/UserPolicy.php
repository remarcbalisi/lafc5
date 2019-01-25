<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        $super_admin = Role::where(['id' => 1])->first();
        if( $user->hasRole($super_admin) ){
            return true;
        }else{
            return $user->id === $model->id;
        }
        
    }

    public function view_user_list(User $user)
    {
        $super_admin = Role::where(['id' => 1])->first();
        if( $user->hasRole($super_admin) ){
            return true;
        }

        return false;
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $super_admin = Role::where(['id' => 1])->first();
        if( $user->hasRole($super_admin) ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        $super_admin = Role::where(['id' => 1])->first();
        if( $user->hasRole($super_admin) ){
            return true;
        }else{
            return $user->id === $model->id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }
}
