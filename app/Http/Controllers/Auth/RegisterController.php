<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Gender;
use App\ContactType;
use App\AddressType;
use App\Role;
use App\Department;
use App\Contact;
use App\Address;
use App\Status;
use App\UserStatus;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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

    public function register(Request $request)
    {
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
        $new_user->department_id = $request->input('department_id');
        $new_user->username = $request->input('username');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();


        $contact_types = ContactType::get();
        $address_types = AddressType::get();

        /**
         * adding of user status; default is inactive (id: 2)
         */
        $user_status = new UserStatus;
        $user_status->user_id = $new_user->id;
        $user_status->status_id = 2;
        $user_status->save();

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
            'success_msg' => 'Successfuly registered!'
        ]);

    }

    /**
     * this will overried the viewing of registration form
     */
    public function showRegistrationForm()
    {
        return view("auth.register")->with([
            'gender' => Gender::get(),
            'contact_types' => ContactType::get(),
            'address_types' => AddressType::get(),
            'roles' => Role::get(),
            'departments' => Department::get()
        ]);
    }

}
