<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Gender;
use App\UserRole;
use App\AddressType;
use App\ContactType;
use App\Role;
use App\Department;
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
            return view('single-user')->with([
                'user' => $selected_user
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }

    }

    public function createUser(){

        if( !Auth::user()->can('create', User::class) )
            abort(403, 'Unauthorized action.');

        return view('user-create')->with([
            'gender' => Gender::get(),
            'team_leaders' => UserRole::where(['role_id' => 3])->get(),
            'address_types' => AddressType::get(),
            'contact_types' => ContactType::get(),
            'roles' => Role::get(),
            'departments' => Department::get()
        ]);
    }

    public function storeUser(Request $request){

        $validatedData = $request->validate([
            'fname' => ['required', 'string', 'max:45'],
            'mname' => ['required', 'string', 'max:45'],
            'lname' => ['required', 'string', 'max:45'],
            'b_day' => ['required'],
            'date_hired' => ['required'],
            'employee_id' => ['required', 'string', 'max:45'],
            'username' => ['required', 'string', 'max:45', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

    }

}
