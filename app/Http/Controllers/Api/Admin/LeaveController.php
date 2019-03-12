<?php

namespace App\Http\Controllers\Api\Admin;

use App\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    public function list(){
        $leaves = Leave::get();
        return response()->json($leaves);
    }
}
