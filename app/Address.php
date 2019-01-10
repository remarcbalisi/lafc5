<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillabe = [
        'street','unit_no','barangay','city',
        'postal_code','province','address_type_id',
        'user_id'
    ];

    public function address_type(){
        return $this->belongsTo('App\AddressType', 'address_type_id');
    }

}
