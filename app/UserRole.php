<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{   
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'user_role';

    protected $fillable = [
        'user_id', 'role_id '
    ];

    public function user(){
        return $this->belongsTo( 'App\User' ,'user_id');
    }

    public function role(){
        return $this->belongsTo( 'App\Role' ,'role_id');
    }

}
