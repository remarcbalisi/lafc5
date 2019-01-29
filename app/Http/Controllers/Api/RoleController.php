<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;

class RoleController extends Controller
{
    public function get(){
        return response()->json(Role::get());
    }
}
