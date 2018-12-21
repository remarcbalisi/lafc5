<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
protected $table = 'contact';

protected $fillable = [
    'number','contact_type_id','user_id','country_code'
];
}
