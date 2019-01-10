<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'mname', 'lname', 'email', 'password',
        'b_day', 'gender_id', 'date_hire', 'employee_id',
        'dept_name', 'date_of_hire', 'employee_id', 'dept_name',
        'date_of_hire', 'status', 'team_leader', 'email', 'password', 
        'username' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gender(){
        return $this->belongsTo('App\Gender', 'gender_id');
    }

    public function department(){
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function user_status(){
        return $this->hasMany('App\UserStatus', 'user_id', 'id');
    }

    public function user_roles(){
        return $this->hasMany('App\UserRole', 'user_id', 'id');
    }

    public function contacts(){
        return $this->hasMany('App\Contact', 'user_id', 'id');
    }

    public function address(){
        return $this->hasMany('App\Address', 'user_id', 'id');
    }

    public function hasRole($role){

        foreach( $this->user_roles()->get() as $user_role ){
            if( $user_role->role_id == $role->id ){
                return true;
            }
        }

        return false;

    }
}
