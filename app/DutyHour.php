<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DutyHour extends Model
{
    protected $table = 'duty_hour';

    protected $fillable = [
        'is_weekdays', 'hours_per_day'
    ];
}
