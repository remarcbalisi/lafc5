<?php

namespace App;

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
}
