<?php

namespace App\Http\Controllers\Api\Admin;

use App\Leave;
use App\Notification;
use App\Role;
use App\UserLeave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LeaveController extends Controller
{
    public function list(){
        $leaves = Leave::get();
        foreach( $leaves as $leave ) {
            $leave['owner'] = $leave->getOwner($leave->id);
            $leave['department'] = $leave->getOwner($leave->id)->department->name;
            $leave['address'] = $leave->getOwner($leave->id)->concatAddress();
            $leave['leave_status'] = $leave->leave_status->name;
        }
        return response()->json($leaves);
    }

    public function apply(Request $request){

        $start_date = new Carbon($request->input('start_date'));
        $end_date = new Carbon($request->input('end_date'));
        $hours_diff = $end_date->diffInHours($start_date);

        if( auth()->user()->leave_credits < $hours_diff ){
            $response = [
                "status" => "error",
                "message" => 'Sorry, You only have ' . auth()->user()->leave_credits . ' hour leave credits'
            ];
            return response()->json($response);
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

        auth()->user()->leave_credits = auth()->user()->leave_credits - $hours_diff;
        auth()->user()->save();

        $roles_ex_agent = Role::where('id', '!=', 4)->get();
        foreach($roles_ex_agent as $rea){
            foreach( $rea->user_roles()->get() as $ur){
                if( $ur->user->department_id == auth()->user()->department_id && $ur->user->id != auth()->user()->id ){
                    $new_user_leave = new UserLeave;
                    $new_user_leave->user_id = auth()->user()->id;
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
                elseif ( $ur->user->department_id == auth()->user()->department_id && $ur->user->id == auth()->user()->id ){
                    $new_user_leave = new UserLeave;
                    $new_user_leave->user_id = auth()->user()->id;
                    $new_user_leave->leave_id = $new_leave->id;
                    $new_user_leave->is_owner = true;
                    $new_user_leave->note = $request->input('note') ? $request->input('note') : null;
                    $new_user_leave->save();
                }
            }
        }

        $response = [
            "status" => "success",
            "message" => 'Leave Successfully requested!'
        ];

        return response()->json($response);

    }

    public function approveDisapprove($leave_id, $user_id, $action, $note=null){

        $user = auth()->user();

        $user_leave = UserLeave::where([
            'leave_id' => $leave_id,
            'direct_approver_id' => $user->id
        ])->first();

        $user_leave->approved_by = $action == 1 ? Auth::user()->id : null;
        $user_leave->approved_at = $action == 1 ? Carbon::now() : null;
        $user_leave->disapproved_by = $action == 1 ? null : Auth::user()->id;
        $user_leave->disapproved_at = $action == 1 ? null : Carbon::now();
        $user_leave->note = $note ? $note : null;
        $user_leave->save();

        if( !empty($user_leave->disapproved_by) ){
            $leave = Leave::where('id', $leave_id)->first();
            $leave->leave_status_id = 2;
            $leave->save();
        }

        $message =  ($user_leave->approved_by != null) ? 'Approved' : 'Disapproved' ."!";

        $new_notification = new Notification;
        $new_notification->title = "Leave request $message";
        $new_notification->body = "Your leave request was " . $message . " by " . $user->fname . " " . $user->lname;
        $new_notification->row_id = $leave_id;
        $new_notification->table_name = 'leave';
        $new_notification->user_id = $user_leave->user_id;
        $new_notification->save();

        return response()->json($user_leave);
    }

}
