<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    
    public function me(){
        return response()->json(auth()->user());
    }

    public function userList(){
        if( auth()->user()->can('view_user_list', User::class) ){
            return response()->json(User::paginate(20));
        }
    }
}
