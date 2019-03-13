<?php

namespace App\Http\Controllers\Agent;

use App\Leave;
use App\LeaveType;
use App\Notification;
use App\Role;
use App\UserLeave;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LeaveController extends Controller
{
    public function apply(){
        $user = Auth::user();
        return view('agent.home')->with([
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

        $new_user_leave = new UserLeave;
        $new_user_leave->user_id = Auth::user()->id;
        $new_user_leave->leave_id = $new_leave->id;
        $new_user_leave->is_owner = true;
        $new_user_leave->note = $request->input('note') ? $request->input('note') : null;
        $new_user_leave->save();

        $roles_ex_agent = Role::where('id', '!=', 4)->get();
        foreach($roles_ex_agent as $rea){
            foreach( $rea->user_roles()->get() as $ur){
                if( $ur->user->department_id == Auth::user()->department_id && $ur->user->id != Auth::user()->id ){
                    $new_user_leave = new UserLeave;
                    $new_user_leave->user_id = Auth::user()->id;
                    $new_user_leave->direct_approver_id = $ur->user->id;
                    $new_user_leave->leave_id = $new_leave->id;
                    $new_user_leave->is_owner = false;
                    $new_user_leave->save();

                    $new_notification = new Notification;
                    $new_notification->title = "New Leave Request";
                    $new_notification->body = "Leave Request from " . $new_leave->getOwner($new_leave->id)->fname . ' ' . $new_leave->getOwner($new_leave->id)->lname;
                    $new_notification->row_id = $new_leave->id;
                    $new_notification->table_name = 'leave';
                    $new_notification->user_id = $ur->user->id;
                    $new_notification->save();

                }
            }
        }

        return redirect()->back()->with([
            'success_msg' => 'Leave Successfully requested!'
        ]);
    }

    public function list(){

        $user_leave = null;

        if( Auth::user()->hasRole(Role::where(['id' => 3])->first()) ){
            $user_leave = UserLeave::where([
                'user_id' => Auth::user()->id,
                'is_owner' => 1
            ])->orWhere('direct_approver_id', Auth::user()->id)
                ->get();
        }else{
            $user_leave = UserLeave::where([
                'user_id' => Auth::user()->id,
                'is_owner' => 1
            ])->get();
        }

        return view('agent.leave.list')->with([
            'leave_requests' => $user_leave,
        ]);
    }

    public function view($leave_request_id){

        $user_leave = null;

        if( Auth::user()->hasRole(Role::where(['id' => 3])->first()) ){
            $user_leave = UserLeave::where([
                'user_id' => Auth::user()->id,
                'is_owner' => 1,
                'leave_id' => $leave_request_id,
            ])->orWhere('direct_approver_id', Auth::user()->id)
                ->first();
        }else{
            $user_leave = UserLeave::where([
                'user_id' => Auth::user()->id,
                'is_owner' => 1,
                'leave_id' => $leave_request_id,
            ])->first();
        }

        return view('agent.leave.single')->with([
            'leave_request' => $user_leave->leave,
        ]);
    }

    public function approveDisapprove(Request $request, $leave_id){
        $request->validate([
            'approve_disapprove' => ['required'],
        ]);

        $user_leave = UserLeave::where([
            'leave_id' => $leave_id,
            'direct_approver_id' => Auth::user()->id
        ])->first();

        $user_leave->approved_by = $request->input('approve_disapprove') == 1 ? Auth::user()->id : null;
        $user_leave->approved_at = $request->input('approve_disapprove') == 1 ? Carbon::now() : null;
        $user_leave->disapproved_by = $request->input('approve_disapprove') == 1 ? null : Auth::user()->id;
        $user_leave->disapproved_at = $request->input('approve_disapprove') == 1 ? null : Carbon::now();
        $user_leave->note = $request->input('note') ? $request->input('note') : null;
        $user_leave->save();

        if( !empty($user_leave->disapproved_by) ){
            $leave = Leave::where('id', $leave_id)->first();
            $leave->leave_status_id = 2;
            $leave->save();
        }

        $message =  ($user_leave->approved_by != null) ? 'Approved' : 'Disapproved' ."!";

        $new_notification = new Notification;
        $new_notification->title = "Leave request $message";
        $new_notification->body = "Your leave request was " . $message . " by " . Auth::user()->fname . " " . Auth::user()->lname;
        $new_notification->row_id = $leave_id;
        $new_notification->table_name = 'leave';
        $new_notification->user_id = $user_leave->user_id;
        $new_notification->save();

        return redirect()->back()->with([
            'success_msg' => "Successfully " . $message . "!"
        ]);
    }

}
