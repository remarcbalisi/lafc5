<?php

namespace App\Http\Controllers\Agent;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NotificationController extends Controller
{
    public function list() {
        return Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('agent.notification.list')->with([
            'notifications' => Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function view($notification_id){
        $notification = Notification::where('id', $notification_id)->first();
        switch ($notification->table_name){
            case 'leave':
                $notification->is_read = true;
                $notification->save();
                return redirect()->route('agent-leave-view', ['leave_request_id'=>$notification->row_id]);

            default:
                return 0;
        }
    }

}
