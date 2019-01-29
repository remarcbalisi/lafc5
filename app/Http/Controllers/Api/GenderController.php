<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Gender;

class GenderController extends Controller
{
    public function get(){
        return response()->json(Gender::get());
    }
}
