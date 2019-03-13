<?php

namespace App\Http\Controllers\Api;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveTypeController extends Controller
{
    public function get(){
        return response()->json(LeaveType::get());
    }
}
