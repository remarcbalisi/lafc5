<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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
