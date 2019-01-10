<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class UserController extends Controller
{
    public function lists(){

        $users = User::get();

        return view('user-lists')->with([
            'users' => $users
        ]);
    }

    public function viewSingleUser($id){

        $selected_user = User::where(['id'=>$id])->first();
        if( Auth::user()->can('view', $selected_user ) ){
            return $selected_user;
        }else{
            abort(403, 'Unauthorized action.');
        }

    }
}
