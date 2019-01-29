<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\User;
use App\Gender;
use App\UserRole;
use App\AddressType;
use App\ContactType;
use App\Role;
use App\Department;
use App\UserStatus;
use App\Contact;
use App\Address;
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

    public function editUser($user_id){

        $edit_user = User::find($user_id);
        if( !Auth::user()->can('update', $edit_user) )
            abort(403, 'Unauthorized action.');

        return view('user-edit')->with([
            'user' => $edit_user,
            'gender' => Gender::get(),
            'team_leaders' => UserRole::where(['role_id' => 3])->get(),
            'address_types' => AddressType::get(),
            'contact_types' => ContactType::get(),
            'roles' => Role::get(),
            'departments' => Department::get()
        ]);

    }

    public function storeUser(Request $request){

        if( !Auth::user()->can('create', User::class) )
            abort(403, 'Unauthorized action.');

        $validatedData = $request->validate([
            'fname' => ['required', 'string', 'max:45'],
            'mname' => ['required', 'string', 'max:45'],
            'lname' => ['required', 'string', 'max:45'],
            'b_day' => ['required'],
            'date_hired' => ['required'],
            'employee_id' => ['unique:users','required', 'string', 'max:45'],
            'gender' => ['required'],
            'username' => ['required', 'string', 'max:45', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

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

        $new_user = new User;
        $new_user->fname = $request->input('fname');
        $new_user->mname = $request->input('mname');
        $new_user->lname = $request->input('lname');
        $new_user->b_day = $request->input('b_day');
        $new_user->gender_id = $request->input('gender');
        $new_user->date_hired = $request->input('date_hired');
        $new_user->employee_id = $request->input('employee_id');
        $new_user->team_leader = $request->input('team_leader');
        $new_user->department_id = $request->input('department_id');
        $new_user->username = $request->input('username');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();

        foreach( $request->input('role') as $r ){
            $new_user_role = new UserRole;
            $new_user_role->user_id = $new_user->id;
            $new_user_role->role_id = $r;
            $new_user_role->save();
        }

        /**
         * adding of user status; default is pending (id: 4)
         */
        $user_status = new UserStatus;
        $user_status->user_id = $new_user->id;
        $user_status->status_id = 1;
        $user_status->save();

        $contact_types = ContactType::get();
        $address_types = AddressType::get();

        foreach( $contact_types as $contact_type ){
            $new_contact = new Contact;
            $new_contact->number = $request->input($contact_type->name . '-number');
            $new_contact->country_code = $request->input($contact_type->name . '-country-code');
            $new_contact->contact_type_id = $contact_type->id;
            $new_contact->user_id = $new_user->id;
            $new_contact->save();
        }

        foreach( $address_types as $address_type ){
            $new_address = new Address;
            $new_address->street = $request->input($address_type->name . '-street');
            $new_address->unit_no = $request->input($address_type->name . '-unit-no');
            $new_address->barangay = $request->input($address_type->name . '-barangay');
            $new_address->city = $request->input($address_type->name . '-city');
            $new_address->postal_code = $request->input($address_type->name . '-postal-code');
            $new_address->province = $request->input($address_type->name . '-province');
            $new_address->address_type_id = $address_type->id;
            $new_address->user_id = $new_user->id;
            $new_address->save();
        }

        return redirect()->back()->with([
            'success_msg' => 'Successfuly Added ' . $new_user->fname
        ]);


    }

    public function updateUser(Request $request, $user_id){

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
            'role' => ['required'],
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
        $updated_user->team_leader = $request->input('team_leader');
        $updated_user->department_id = $request->input('department_id');
        $updated_user->username = $request->input('username');
        $updated_user->email = $request->input('email');
        $updated_user->password = ( $request->input('password') ? Hash::make($request->input('password')) : $updated_user->password );
        $updated_user->save();
        
        foreach( $request->input('role') as $role_input ){

            if( $updated_user->user_roles()->where('role_id', '=', $role_input)->get()->count() == 0 ){
                $new_user_role = new UserRole;
                $new_user_role->user_id = $updated_user->id;
                $new_user_role->role_id = $role_input;
                $new_user_role->save();
            }
            foreach( $updated_user->user_roles()->get() as $ur ){
                if( in_array($ur->role_id, $request->input('role')) ){
                    //do nothing..
                }else{
                    $updated_user->user_roles()->where('role_id', '=', $ur->role_id)->first()->delete();
                }
            }

            foreach( $updated_user->user_roles()->onlyTrashed()->get() as $ur ){
                if( in_array($ur->role_id, $request->input('role')) ){
                    $updated_user->user_roles()->onlyTrashed()->where('role_id', '=', $ur->role_id)->first()->restore();
                    if( $ur->role_id == 3 ){
                        $updated_user->team_leader = null;
                        $updated_user->save();
                    }
                }else{
                    //do nothing...
                }
            }

        }      

        return redirect()->back()->with([
            'success_msg' => 'Successfuly Updated ' . $updated_user->fname
        ]);

    }

}
