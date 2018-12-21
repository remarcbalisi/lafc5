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
}
