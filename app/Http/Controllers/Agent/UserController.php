<?php

namespace App\Http\Controllers\Agent;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function viewSingleUser($id){

        $selected_user = User::where(['id'=>$id])->first();
        if( Auth::user()->can('view', $selected_user ) ){
            return view('agent.users.view')->with([
                'user' => $selected_user
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }

    }
}
