<?php

namespace App\Http\Controllers\Agent;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LeaveController extends Controller
{
    public function apply(){
        $user = Auth::user();
        return view('agent.leave.apply')->with([
            'leave_types' => LeaveType::get(),
            'user' => $user,
            'contact' => $user->contacts()->first()
        ]);
    }
}
