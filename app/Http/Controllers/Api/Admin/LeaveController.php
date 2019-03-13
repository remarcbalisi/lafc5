<?php

namespace App\Http\Controllers\Api\Admin;

use App\Leave;
use App\Notification;
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
