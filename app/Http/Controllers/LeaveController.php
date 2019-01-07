<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function tableLists(){
        return view('leave-lists');
    }
}
