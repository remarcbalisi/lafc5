<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leave';

    protected $fillable = [
        'date_applied','leave_start_date','leave_end_date','leave_credits',
        'leave_address','contact','leve_type_id','leave_status_id'
    ];

    public function user_leave(){
        return $this->hasMany('App\UserLeave', 'leave_id', 'id');
    }

    public function getOwner($leave_id){
        return $this->user_leave()->where([
            'is_owner' => true,
            'leave_id' => $leave_id
        ])->first()->user;
    }

    public function leave_status(){
        return $this->belongsTo('App\LeaveStatus', 'leave_status_id');
    }
}
