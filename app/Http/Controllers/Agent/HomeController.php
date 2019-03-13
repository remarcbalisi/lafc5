<?php

namespace App\Http\Controllers\Agent;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function home(){
        $user = Auth::user();
        return view('agent.home')->with([
            'leave_types' => LeaveType::get(),
            'user' => $user,
            'contact' => $user->contacts()->first()
        ]);
    }
}
