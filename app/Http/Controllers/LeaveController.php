<?php

namespace App\Http\Controllers;

use App\Leave;
use App\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class LeaveController extends Controller
{
    public function tableLists(){
        return view('leave-lists');
    }

    public function apply(){
        $user = Auth::user();
        return view('leave-apply')->with([
            'leave_types' => LeaveType::get(),
            'user' => $user,
            'contact' => $user->contacts()->first()
        ]);
    }

    public function store(Request $request){
        $start_date = new Carbon($request->input('start_date'));
        $end_date = new Carbon($request->input('end_date'));
        $hours_diff = $end_date->diffInHours($start_date);

        if( Auth::user()->leave_credits < $hours_diff ){
            return redirect()->back()->withErrors([
                'not_enough_credits' => 'Sorry, You only have ' . Auth::user()->leave_credits . ' hour leave credits'
            ]);
        }

        $new_leave = new Leave;
        $new_leave->date_applied = Carbon::now();
        $new_leave->leave_start_date = $start_date;
        $new_leave->leave_end_date = $end_date;
        $new_leave->leave_address = $request->input('leave_address');
        $new_leave->contact = $request->input('contact');
        $new_leave->leave_type_id = $request->input('leave_type');
        $new_leave->leave_status_id = 3;
        $new_leave->save();

        Auth::user()->leave_credits = Auth::user()->leave_credits - $hours_diff;
        Auth::user()->save();

        return redirect()->back()->with([
            'success_msg' => 'Leave Successfully requested!'
        ]);
    }
}
