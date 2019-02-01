<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeave extends Model
{
    protected $table = 'user_leave';

    protected $fillable = [
        'user_id','direct_approver_id','leave_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function direct_approver(){
        return $this->belongsTo('App\User','direct_approver_id');
    }
}
