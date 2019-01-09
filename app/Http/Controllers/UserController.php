<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function lists(){

        $users = User::get();

        return view('user-lists')->with([
            'users' => $users
        ]);
    }
}
