<?php

namespace App\Http\Controllers\Agent;

use App\AddressType;
use App\ContactType;
use App\Department;
use App\Gender;
use App\Role;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\Rule;

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

    public function edit($user_id){
        $edit_user = User::find($user_id);
        if( !Auth::user()->can('update', $edit_user) )
            abort(403, 'Unauthorized action.');

        return view('agent.users.edit')->with([
            'user' => $edit_user,
            'gender' => Gender::get(),
            'team_leaders' => UserRole::where(['role_id' => 3])->get(),
            'address_types' => AddressType::get(),
            'contact_types' => ContactType::get(),
            'roles' => Role::get(),
            'departments' => Department::get()
        ]);
    }

    public function update(Request $request, $user_id) {
        $updated_user = User::find($user_id);
        if( !Auth::user()->can('update', $updated_user) )
            abort(403, 'Unauthorized action.');

        $validatedData = $request->validate([
            'fname' => ['required', 'string', 'max:45'],
            'mname' => ['required', 'string', 'max:45'],
            'lname' => ['required', 'string', 'max:45'],
            'b_day' => ['required'],
            'date_hired' => ['required'],
            'employee_id' => [Rule::unique('users')->ignore($updated_user->id),'required', 'string', 'max:45'],
            'username' => ['required', 'string', 'max:45', Rule::unique('users')->ignore($updated_user->id),],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($updated_user->id),],
        ]);

        if( $request->input('password') ){
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
        }

        /**
         * Check if user change fname || mname || lname
         */
        if( $updated_user->fname != $request->input('fname')
            || $updated_user->mname != $request->input('mname')
            || $updated_user->lname != $request->input('lname')
        ){

            /**
             * check if user already exist with given fname, mname,lname
             * then return user exist if true.
             */
            $check_user = User::where([
                'fname' => $request->input('fname'),
                'mname' => $request->input('mname'),
                'lname' => $request->input('lname'),
            ])->get();

            if( count($check_user) > 0 ){
                return redirect()->back()->withErrors([
                    'user_exist' => "User Already Exist!"
                ]);
            }

        }


        $updated_user->fname = $request->input('fname');
        $updated_user->mname = $request->input('mname');
        $updated_user->lname = $request->input('lname');
        $updated_user->b_day = $request->input('b_day');
        $updated_user->gender_id = $request->input('gender');
        $updated_user->date_hired = $request->input('date_hired');
        $updated_user->employee_id = $request->input('employee_id');
        $updated_user->username = $request->input('username');
        $updated_user->email = $request->input('email');
        $updated_user->password = ( $request->input('password') ? Hash::make($request->input('password')) : $updated_user->password );
        $updated_user->save();


        return redirect()->back()->with([
            'success_msg' => 'Successfuly Updated ' . $updated_user->fname
        ]);
    }
}
