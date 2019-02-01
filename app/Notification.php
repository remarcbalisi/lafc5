<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'title', 'body', 'row_id', 'table_name', 'user_id', 'is_read'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function dateFormat($date, $format = 'l jS \\of F Y h:i:s A'){
        $new_date = new Carbon($date);
        return $new_date->format($format);
    }
}
