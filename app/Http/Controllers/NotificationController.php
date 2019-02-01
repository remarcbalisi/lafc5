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
}
