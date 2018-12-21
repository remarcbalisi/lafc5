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
}
