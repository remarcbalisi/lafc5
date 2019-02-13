<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * this will let the user log in using their email/username
     */

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    protected function authenticated(Request $request, $user)
    {
        $admin = Role::where('id', 1)->first();
        $hr = Role::where('id', 2)->first();
        $agent = Role::where('id', 4)->first();

        if ( $user->hasRole($admin) ) {// do your margic here
            return redirect()->route('user-lists');
        }
        if ( $user->hasRole($hr) ) {// do your margic here
            return redirect()->route('hrm-home');
        }
        if ( $user->hasRole($agent) ) {// do your margic here
            return redirect()->route('agent-home');
        }

        return redirect('/home');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
}
