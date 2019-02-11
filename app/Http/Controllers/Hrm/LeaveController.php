<?php

namespace App\Http\Controllers\Hrm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LeaveType;
use Auth;

class LeaveController extends Controller
{
    public function apply(){
        $user = Auth::user();
        return view('hrm.leave.apply')->with([
            'leave_types' => LeaveType::get(),
            'user' => $user,
            'contact' => $user->contacts()->first()
        ]);
    }
}
