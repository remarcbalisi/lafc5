<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeave extends Model
{
    protected $table = 'user_leave';

    protected $fillable = [
        'user_id','direct_approver','leave_id'
    ];
}
