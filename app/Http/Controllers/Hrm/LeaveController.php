<?php

namespace App\Http\Controllers\Hrm;

use App\Leave;
use App\LeaveStatus;
use App\Notification;
use App\Role;
use App\User;
use App\UserLeave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LeaveType;
use Auth;
use Carbon\Carbon;
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
        return view('hrm.leave.list')->with([
            'leave_requests' => Leave::get(),
        ]);
    }

    public function view($leave_request_id){
        if( !Auth::user()->can('view_single_leave', User::class) )
            abort(403, 'Unauthorized action.');

        return view('single-leave-request')->with([
            'leave_request' => Leave::where('id', $leave_request_id)->first(),
            'leave_status' => LeaveStatus::get(),
        ]);
    }

}
