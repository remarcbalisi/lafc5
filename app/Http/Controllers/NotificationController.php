<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    public function list(){
        return view('notification-list')->with([
            'notifications' => Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function view($notification_id){
        $notification = Notification::where('id', $notification_id)->first();
        switch ($notification->table_name){
            case 'leave':
                $notification->is_read = true;
                $notification->save();
                return redirect()->route('leave-view', ['leave_request_id'=>$notification->row_id]);

            default:
                return 0;
        }
    }
}
